<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pegawai;
use App\Unit;
use App\Jabatan;
use App\Pengajuan;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  // User home page
  public function user()
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = DB::table('pegawai2')
    ->where('id', '=', $id)->first();

    $pengajuan = DB::table('pengajuan2')
    ->where('pegawai_id', '=', $id)
    ->get();

    $pengajuan2 = DB::table('pengajuan2')
    ->where([
      ['unit_id', '=', $pegawai->unit_id],
      ['jabatan_id', '=', 1]
    ])
    ->get();

    return view('user', ['pegawai' => $pegawai, 'pengajuan' => $pengajuan, 'pengajuan2' => $pengajuan2]);
  }

  // Home page
  public function index() {
    return view('index');
  }

}
