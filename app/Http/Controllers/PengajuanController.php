<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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

  public function store(Request $request) {
    $this->validate($request,[
      'pegawai_id' => 'required',
      'jenis_cuti' => 'required',
      'tanggal_pengajuan' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
    ]);

    $input = Pengajuan::create([
    'id' => $request->id,
    'pegawai_id' => $request->pegawai_id,
    'jenis_cuti' => $request->jenis_cuti,
    'tanggal_pengajuan' => $request->tanggal_pengajuan,
    'lama_cuti'=> $request->lama_cuti,
    'mulai'=> $request->mulai,
    'hingga'=> $request->hingga,
    'unit_id'=> $request->unit_id,
    'jabatan_id'=> $request->jabatan_id,
    'status' => $request->status
    ]);

    if ($request->file) {
      $validator = Validator::make($request->all(), [
        'file' => 'required|mimes:jpeg,png,jpg,pdf|max:2048'
      ]);

      if ($validator->fails()) {
        return redirect()->back()->with('danger', 'Pastikan file berformat .jpeg .jpg .pdf');
      }

      else {
        $pegawai_id = auth()->user()->pegawai_id;
        $pegawai = Pegawai::find($pegawai_id);
        $file = $request->file('file');
        $file_name = time()."_".$pegawai->nama."_".$request->jenis_cuti.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'files';
        $file->move($tujuan_upload, $file_name);

        $input->file = $file_name;
        $input->save();
      }
    }

    return redirect()->back()->with('success', 'Data berhasil ditambakan');
  }

  public function download($id) {

      $pengajuan = Pengajuan::find($id);
      $file = public_path(). "/files/$pengajuan->file";

      $headers = array(
        'Content-Type: application/pdf',
      );

      return response()->download($file);

  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'jenis_cuti' => 'required',
    ]);

    if ($request->jenis_cuti !== "Tahunan") {
      if ($request->file) {

        $pengajuan = Pengajuan::find($id);

        $validator = Validator::make($request->all(), [
          'file' => 'mimes:jpeg,png,jpg,pdf|max:2048'
        ]);

        if ($validator->fails()) {
          return redirect()->back()->with('danger', 'Pastikan file berformat .jpeg .jpg .png .pdf');
        }

        File::delete('files/'.$pengajuan->file);
        $pegawai_id = auth()->user()->pegawai_id;
        $pegawai = Pegawai::find($pegawai_id);
        $file = $request->file('file');
        $file_name = time()."_".$pegawai->nama."_".$request->jenis_cuti.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'files';
        $file->move($tujuan_upload, $file_name);

        $pengajuan->file = $file_name;
        $pengajuan->save();
      }
    }
    else {
      $pengajuan = Pengajuan::find($id);
      File::delete('file/'.$pengajuan->file);
      $pengajuan->file = null;
      $pengajuan->save();
    }

    $pengajuan = Pengajuan::find($id);
    $pengajuan->jenis_cuti = $request->jenis_cuti;
    $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
    $pengajuan->lama_cuti = $request->lama_cuti;
    $pengajuan->mulai = $request->mulai;
    $pengajuan->hingga = $request->hingga;    
    $pengajuan->save();

    return redirect()->back()->with('success', 'Data Cuti berhasil diubah');
  }

  public function delete($id)
  {
    $pengajuan = Pengajuan::find($id);
    File::delete('file/'.$pengajuan->file);
    $pengajuan->delete();
    return redirect('/user');
  }
}
