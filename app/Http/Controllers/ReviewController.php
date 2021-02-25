<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  // method untuk insert data ke table unit
  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    Review::create([
      'id' => $request->id,
      'name' => $request->name,
      'email' => $request->email,
      'message' => $request->message
    ]);

    return redirect()->back()->with('success', 'Terima kasih telah memberi ulasan');
  }
}
