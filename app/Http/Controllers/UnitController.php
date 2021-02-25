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
  public function index()
  {
    $unit = Unit::all();
    return view('unit', ['unit' => $unit]);
  }

  public function input()
  {

    // Memanggil view tambah
    return view('unit_input');

  }

  // method untuk insert data ke table unit
  public function store(Request $request)
  {
    $this->validate($request,[
      'nama_unit' => 'required'
    ]);

    Unit::create([
      'id' => $request->id,
      'nama_unit' => $request->nama_unit
    ]);

    return redirect('/unit');
  }

  public function edit($id)
  {
    $unit = Unit::find($id);
    return view('unit_edit', ['unit' => $unit]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'nama_unit' => 'required',
    ]);

    $unit = Unit::find($id);
    $unit->nama_unit = $request->nama_unit;
    $unit->save();
    return redirect('/unit');
  }

  public function delete($id)
  {
    $unit = Unit::find($id);
    $unit->delete();
    return redirect('/unit');
  }

  public function search(Request $request)
  {
    // menangkap data pencarian
    $search = $request->search;

    // mengambil data dari table pegawai sesuai pencarian data
    $unit = DB::table('unit')
    ->where('nama_unit','like',"%".$search."%")
    ->Paginate(5);
    // mengirim data pegawai ke view index
    return view('unit',['unit' => $unit]);

  }
}
