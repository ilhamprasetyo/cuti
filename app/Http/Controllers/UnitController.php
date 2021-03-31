<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Unit;

class UnitController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  // Unit page
  public function index()
  {
    $unit = Unit::all();
    return view('unit', ['unit' => $unit]);
  }

  // Insert data to database
  public function store(Request $request)
  {
    $this->validate($request,[
      'nama_unit' => 'required'
    ]);

    Unit::create([
      'id' => $request->id,
      'nama_unit' => $request->nama_unit
    ]);

    return redirect('/unit')->with('success', 'Data berhasil disimpan');
  }

  // Update data
  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'nama_unit' => 'required',
    ]);

    $unit = Unit::find($id);
    $unit->nama_unit = $request->nama_unit;
    $unit->save();
    return redirect('/unit')->with('success', 'Data berhasil diubah');
  }

  // Delete data
  public function delete($id)
  {
    $unit = Unit::find($id);
    $unit->delete();
    return redirect('/unit')->with('success', 'Data berhasil dihapus');
  }
}
