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

  public function index() {
    return Review::all();
  }

  // Insert data to database
  public function store(Request $request) {

    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    $input = Review::create([
      'id' => $request->id,
      'name' => $request->name,
      'email' => $request->email,
      'message' => $request->message
    ]);

    return redirect()->back()->with('success', 'Terima kasih telah memberi ulasan');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    $review = Review::find($id);
    $review->name = $request->name;
    $review->email = $request->email;
    $review->message = $request->message;
    $review->save();

    return $review;
  }

  public function delete($id)
  {
    $review = Review::find($id);
    $review->delete();
    return $review;
  }
}
