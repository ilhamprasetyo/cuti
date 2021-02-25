<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Pengajuan;
use App\Pegawai;
use App\Unit;
use App\Jabatan;

class PengajuanController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */
  public function index(Request $request)
  {
    $pengajuan = DB::table('pengajuan2')->get();
    $request->session()->put('key','check');
    return view('pengajuan', ['pengajuan' => $pengajuan, 'request' => $request]);
  }

  public function input()
  {
    return view('pengajuan_input');
  }

  public function store(Request $request) {
    $this->validate($request,[
      'pegawai_id' => 'required',
      'tanggal_pengajuan' => 'required',
      'lama_cuti' => 'required',
      'mulai' => 'required',
      'hingga' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
    ]);

    Pengajuan::create([
      'id' => $request->id,
      'pegawai_id' => $request->pegawai_id,
      'tanggal_pengajuan' => $request->tanggal_pengajuan,
      'lama_cuti'=> $request->lama_cuti,
      'mulai'=> $request->mulai,
      'hingga'=> $request->hingga,
      'unit_id'=> $request->unit_id,
      'jabatan_id'=> $request->jabatan_id,
      'status' => $request->status
    ]);

    return redirect()->back()->with('success', 'Data berhasil ditambakan');
  }

  public function edit($id)
  {
    $pengajuan = Pengajuan::find($id);

    $unit = Unit::all()
    ->where('id', '=', $pengajuan->unit_id);

    $jabatan = Jabatan::all()
    ->where('id', '=', $pengajuan->jabatan_id);

    return view('pengajuan_edit', ['pengajuan' => $pengajuan, 'unit' => $unit, 'jabatan' => $jabatan]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'tanggal_pengajuan' => 'required',
      'lama_cuti' => 'required',
      'mulai' => 'required',
      'hingga' => 'required',
    ]);

    $pengajuan = Pengajuan::find($id);
    $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
    $pengajuan->lama_cuti = $request->lama_cuti;
    $pengajuan->mulai = $request->mulai;
    $pengajuan->hingga = $request->hingga;
    $pengajuan->status = $request->status;
    $pengajuan->save();

    if ($pengajuan->status == null)
    {
      return redirect()->back()->with('success', 'Data Cuti berhasil diubah');
    }

    else
    {

      if ($pengajuan->status == "Disetujui") {
        $cuti = DB::table('pegawai')
        ->where('id', '=', $pengajuan->pegawai_id)
        ->decrement('cuti', $pengajuan->lama_cuti);
        return back()->with('success', 'Cuti disetujui');
      }

      elseif ($pengajuan->status == "Tidak Disetujui") {
        return back()->with('warning', 'Cuti tidak disetujui');
      }

      else {
        return back()->with('danger', 'Cuti dibatalkan');
      }

    }

  }

  public function delete($id)
  {
    $pengajuan = Pengajuan::find($id);
    $pengajuan->delete();
    return redirect('/user');
  }

  public function search(Request $request)
  {
    // menangkap data pencarian
    $search = $request->search;
    $search2 = $request->search2;

    $id = auth()->user()->pegawai_id;

    $pegawai = DB::table('pegawai2')
    ->where('id', '=', $id)->first();

    $pengajuan = DB::table('pengajuan2')
    ->where('tanggal_pengajuan' , '=', $search)
    ->where('status', '=', $search2)
    ->paginate(5);

    if (auth()->user()->jabatan_id == 2) {
      return view('koordinator', ['pengajuan' => $pengajuan, 'pegawai' => $pegawai]);
    }

    else {
      return view('user', ['pengajuan' => $pengajuan, 'pegawai' => $pegawai]);
    }
  }

  public function rincian($id)
  {
    $pengajuan = DB::table('pengajuan2')->find($id);

    $id2 = auth()->user()->pegawai_id;
    $pegawai = DB::table('pegawai2')
    ->where('id', '=', $id2)->first();

    return view('rincian', ['pengajuan' => $pengajuan, 'pegawai' => $pegawai,]);
  }

  public function batal($id)
  {
    $pengajuan = Pengajuan::find($id);

    $pengajuan2 = DB::table('pengajuan')
    ->where('id', '=', $id)
    ->update(['status' => 'Dibatalkan']);

    $cuti = DB::table('pegawai')
    ->where('id', '=', $pengajuan->pegawai_id)
    ->increment('cuti', $pengajuan->lama_cuti);

    return redirect('/approval');
  }

  public function approval(Request $request)
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = DB::table('pegawai2')
    ->where('id', '=', $id)->first();

    $pengajuan = DB::table('pengajuan2')
    ->where([
      ['unit_id', '=', $pegawai->unit_id],
      ['jabatan_id', '=', 1]
    ])
    ->get();

    $disable = $request->session()->get('key', 'disabled');

    return view('approval', ['pegawai' => $pegawai, 'pengajuan' => $pengajuan, 'disable' => $disable]);
  }
}
