<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


use App\Pegawai;
use App\Pegawai2;
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
    $pegawai = Pegawai2::orderBy('id', 'asc')
    ->get();

    $unit = Unit::all();

    $jabatan = Jabatan::all();

    return view('pegawai', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan]);
  }

  // Insert data
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

    return redirect('/pegawai')->with('success', 'Data berhasil disimpan');
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

    if (auth()->user()->jabatan_id === !0) {
      return redirect('/profile')->with('success', 'Data berhasil diubah');
    }

    return redirect('/pegawai')->with('success', 'Data berhasil diubah');
  }

  // Delete data
  public function delete($id)
  {
    $pegawai = Pegawai::find($id);
    $pegawai->delete();
    return redirect('/pegawai')->with('success', 'Data berhasil dihapus');
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

  // Insert data
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

}
