<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


use App\Pegawai;
use App\Unit;
use App\Jabatan;
use App\User;

class PegawaiController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  // Pegawai page
  public function index()
  {
    $pegawai = DB::table('pegawai2')
    ->orderBy('id', 'asc')
    ->get();
    $unit = Unit::all();
    $jabatan = Jabatan::all();
    return view('pegawai', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan]);
  }

  // Insert data to database
  public function store(Request $request)
  {

    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
      'cuti' => 'required'
    ]);

    Pegawai::create([
      'id' => $request->id,
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'unit_id'=> $request->unit_id,
      'jabatan_id'=> $request->jabatan_id,
      'cuti'=> $request->cuti
    ]);

    return redirect('/pegawai');
  }

  // Update data
  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
      'cuti' => 'required'
    ]);

    $pegawai = Pegawai::find($id);
    $pegawai->nama = $request->nama;
    $pegawai->alamat = $request->alamat;
    $pegawai->unit_id = $request->unit_id;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->cuti = $request->cuti;
    $pegawai->save();

    return redirect('/pegawai');
  }

  // Delete data
  public function delete($id)
  {
    $pegawai = Pegawai::find($id);
    $pegawai->delete();
    return redirect('/pegawai');
  }

  // Check your ID (Registrasi)
  public function check(Request $request)
  {

    if($request->session()->has('key')) {
      $request->session()->forget('key');
      return view('/check');
    }

    else {
      return view('check');
    }

  }

  // Membuat session supaya page checked tidak bisa diakses sebelum input ID di page check
  public function request(Request $request)
  {
    $check = $request->check;
    $request->session()->put('session', $check);
    $request->session()->put('key', 'check');
    return redirect('/checked');
  }

  // Checked page
  public function checked(Request $request) {
    $check = $request->session()->get('session');
  
    if($request->session()->has('key')) {
      $pegawai = DB::table('pegawai')
      ->where('id','=',$check)->first();

      $user = DB::table('users')
      ->where('pegawai_id','=',$check)
      ->exists();

      if ($pegawai === null) {
        $request->session()->forget('key');
        return redirect('/check')->with('warning','ID tidak ditemukan!');
      }

      elseif ($user) {
        $request->session()->forget('key');
        return redirect('/check')->with('info','Pegawai dengan ID ini sudah melakukan registrasi');
      }

      else {
        $pegawai = DB::table('pegawai2')
        ->where('id','=',$check)
        ->first();
        return view('checked', ['pegawai' => $pegawai]);
      }
    }

    else {
      $request->session()->forget('key');
      return redirect('/check')->with('info','Silahkan input ID');
    }
  }

  public function registered(Request $request)
  {

    $email = DB::table('users')
    ->where('email', '=', $request->email)
    ->exists();

    if ($email) {
      return redirect()->back()->with('info', 'Email sudah terpakai');
    }

    else {
      $this->validate($request,[
        'pegawai_id' => 'required',
        'email' => 'required',
        'unit_id' => 'required',
        'jabatan_id' => 'required',
        'password' => 'required',
      ]);

      User::create([
        'pegawai_id' => $request->get('pegawai_id'),
        'email' => $request->get('email'),
        'unit_id' => $request->get('unit_id'),
        'jabatan_id' => $request->get('jabatan_id'),
        'password'=> Hash::make($request['password']),
      ]);

      $request->session()->forget('key');
      return redirect('/')->with('info', 'Email dan Password berhasil dibuat, silahkan login');
    }

  }

  public function profile(Request $request)
  {
    $id = auth()->user()->pegawai_id;
    $pegawai = DB::table('pegawai2')->find($id);
    $disable = $request->session()->get('key', 'disabled');
    return view('profile', ['pegawai' => $pegawai, 'disable' => $disable]);
  }

  public function change_password(Request $request)
  {
    $id = auth()->user()->id;
    $password = auth()->user()->password;
    $password_lama = $request->password_lama;
    $password_baru = $request->$password;

    if (Hash::check($password_lama, $password)) {
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password_baru)]);
        return redirect()->back()->with('success', 'Password berhasil diganti');
    }

    else {
        return redirect()->back()->with('warning', 'Password salah');
    }
  }

  public function upload_photo(Request $request, $id){

    $validator = Validator::make($request->all(), [
      'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($validator->fails()) {
          return redirect()->back()->with('danger', 'Pastikan file berupa gambar berformat .jpeg atau .jpg');
    }

    $pegawai = Pegawai::find($id);
    File::delete('file/'.$pegawai->file);

    $file = $request->file('file');
    $file_name = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'file';
    $file->move($tujuan_upload, $file_name);

    $pegawai->file = $file_name;
    $pegawai->save();

    return redirect()->back()->with('success', 'Foto berhasil diperbaharui');
  }

  public function delete_photo($id)
  {
    $file = Pegawai::find($id);
    File::delete('file/'.$file->file);
    $file->file = null;
    $file->save();
    return redirect()->back()->with('success', 'Foto berhasil dihapus');
  }
}
