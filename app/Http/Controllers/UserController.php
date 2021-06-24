<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


use App\Pegawai;
use App\Pegawai2;
use App\Unit;
use App\Jabatan;
use App\Pengajuan2;
use App\User;

class UserController extends Controller
{

  // User page
  public function user()
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = Pegawai2::where('id', $id)->first();

    $pengajuan = Pengajuan2::where('pegawai_id', $id)
    ->orderBy('id', 'desc')
    ->get();

    return view('user', ['pegawai' => $pegawai, 'pengajuan' => $pengajuan]);
  }

  // Upload profile photo
  public function upload_photo(Request $request, $id){

    $validator = Validator::make($request->all(), [
      'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($validator->fails()) {
          return redirect()->back()->with('danger', 'Pastikan file berupa gambar berformat .jpeg atau .jpg');
    }

    $pegawai = Pegawai::find($id);
    File::delete('photos/'.$pegawai->file);

    $pegawai_id = auth()->user()->pegawai_id;
    $pegawai = Pegawai::find($pegawai_id);
    $file = $request->file('file');
    $file_name = time()."_".$pegawai->nama."_"."Photo".".".$file->getClientOriginalExtension();
    $tujuan_upload = 'photos';
    $file->move($tujuan_upload, $file_name);

    $pegawai->file = $file_name;
    $pegawai->save();

    return redirect()->back()->with('success', 'Foto berhasil diperbaharui');
  }

  // Delete photo
  public function delete_photo($id)
  {
    $file = Pegawai::find($id);
    File::delete('photos/'.$file->file);
    $file->file = null;
    $file->save();
    return redirect()->back()->with('success', 'Foto berhasil dihapus');
  }

  // Update profile
  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'nama' => 'required',
      'email' => 'required',
      'alamat' => 'required'
    ]);

    $pegawai = Pegawai::find($id);
    $pegawai->nama = $request->nama;
    $pegawai->alamat = $request->alamat;
    $pegawai->save();

    $id2 = auth()->user()->id;
    $user = User::find($id2);
    $user->email = $request->email;
    $user->save();

    if(auth()->user()->email === $request->email) {
      return redirect()->back()->with('success', 'Profile berhasil di-update');
    }

    else {
      $request->session()->put('change', 'message');
      return redirect('/logout');
    }

  }

  // Profile page
  public function profile(Request $request)
  {
    if (auth()->user()->jabatan_id !== 0) {
      $id = auth()->user()->pegawai_id;
      $pegawai = Pegawai2::find($id);
      $unit = Unit::all();
      $jabatan = Jabatan::all();
      $disable = true;
      return view('profile', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan, 'disable' => $disable]);
    }

    else {
      return redirect()->back()->with('danger','Tidak dapat mengakses halaman tersebut');
    }
  }
}
