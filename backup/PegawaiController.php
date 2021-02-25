<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
  public function index()
  {
    $pegawai = DB::table('pegawai2')
    ->orderBy('id', 'desc')
    ->get();
    $unit = Unit::all();
    $jabatan = Jabatan::all();
    return view('pegawai', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan]);
  }

  public function input()
  {

    $pegawai = DB::table('pegawai');
    return view('pegawai_input');

  }

  public function store(Request $request)
  {

    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
      'cuti' => 'required',
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

  public function edit($id)
  {
    $pegawai = DB::table('pegawai2')->find($id);
    $unit = Unit::all();
    $jabatan = Jabatan::all();
    return view('pegawai_edit', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan]);
  }

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
    $pegawai->nama = $request->get('nama');
    $pegawai->alamat = $request->get('alamat');
    $pegawai->unit_id = $request->get('unit_id');
    $pegawai->jabatan_id = $request->get('jabatan_id');
    $pegawai->cuti = $request->get('cuti');
    $pegawai->save();

    return redirect('/pegawai');
  }

  public function delete($id)
  {
    $pegawai = Pegawai::find($id);
    $pegawai->delete();
    return redirect('/pegawai');
  }

  public function search(Request $request)
  {
    // menangkap data pencarian
    $search = $request->search;

    // mengambil data dari table pegawai sesuai pencarian data
    $pegawai = DB::table('pegawai2')
    ->where('nama','like',"%".$search."%")
    ->simplePaginate(5);
    $unit = Unit::all();
    $jabatan = Jabatan::all();
    // mengirim data pegawai ke view index
    return view('pegawai', ['pegawai' => $pegawai, 'unit' => $unit, 'jabatan' => $jabatan]);

  }

  public function check(Request $request)
  {
    if($request->session()->has('key')) {
      $request->session()->forget('key');
      $request->session()->put('key', 'check');
      return view('/check');
    }
    
    else {
      $request->session()->put('key', 'check');
      return view('check');
    }
  }

  public function checked(Request $request) {
    $check = $request->check;
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
        $check = $request->check;

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
    ->where('email','=',$request->email)
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
      return redirect('/');
    }

  }

  public function profile($id)
  {
    $pegawai = DB::table('pegawai2')->find($id);
    return view('profile', ['pegawai' => $pegawai]);
  }
}
