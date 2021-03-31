<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;
use App\Pegawai2;
use App\Pengajuan;
use App\Pengajuan2;

class KoordinatorController extends Controller
{

  // Approval page
  public function approval(Request $request)
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = Pegawai2::where('id', $id)->first();

    $pengajuan = Pengajuan2::where([
      ['unit_id', $pegawai->unit_id],
      ['jabatan_id', 1]
    ])
    ->get();

    $disable = true;

    return view('approval', ['pegawai' => $pegawai, 'pengajuan' => $pengajuan, 'disable' => $disable]);
  }

  // Karyawan page
  public function karyawan()
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = Pegawai2::where('id', $id)->first();

    $karyawan = Pegawai2::where([
        ['unit_id', $pegawai->unit_id],
        ['jabatan_id', 1]
      ])->get();

    $disable = true;

    return view('karyawan', ['pegawai' => $pegawai, 'karyawan' => $karyawan, 'disable' => $disable]);
  }

  // Update status cuti
  public function status(Request $request, $id) {
    $pengajuan = Pengajuan::find($id);
    $pengajuan->status = $request->status;
    $pengajuan->save();

    if ($pengajuan->status == "Disetujui") {
      $cuti = Pegawai::where('id', '=', $pengajuan->pegawai_id)
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

  // Batalkan cuti
  public function batal($id)
  {
    $pengajuan = Pengajuan::find($id);

    $pengajuan2 = Pengajuan::where('id', '=', $id)
    ->update(['status' => 'Dibatalkan']);

    $cuti = Pegawai::where('id', '=', $pengajuan->pegawai_id)
    ->increment('cuti', $pengajuan->lama_cuti);

    return redirect('/approval');
  }
}
