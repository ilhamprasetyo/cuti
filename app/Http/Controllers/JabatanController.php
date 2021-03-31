<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  // Jabatan page
  public function index()
  {
    $jabatan = DB::table('jabatan')->get();
    return view('jabatan', ['jabatan' => $jabatan]);
  }

  // Insert data to database
  public function store(Request $request)
  {
    $this->validate($request,[
      'nama_jabatan' => 'required'

    ]);

    Jabatan::create([
      'nama_jabatan' => $request->nama_jabatan,
    ]);

    return redirect('/jabatan')->with('success', 'Data berhasil disimpan');
  }

  // Update data
  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'nama_jabatan' => 'required',
    ]);

    $jabatan = Jabatan::find($id);
    $jabatan->nama_jabatan = $request->nama_jabatan;
    $jabatan->save();

    return redirect('/jabatan')->with('success', 'Data berhasil diubah');
  }

  // Delete data
  public function delete($id)
  {
    $jabatan = Jabatan::find($id);
    $jabatan->delete();

    return redirect('/jabatan')->with('success', 'Data berhasil dihapus');
  }

}
