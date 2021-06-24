<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function() {
  Route::get('/all', [ReviewController::class, 'getAllReview']);

  Route::get('/data_review', [ReviewController::class, 'getReview'])->name('data');

  Route::get('/get', [ReviewController::class, 'filterReview']);
  Route::post('/store', [ReviewController::class, 'store']);
  Route::get('/edit/{id}', [ReviewController::class, 'edit']);
  Route::put('/update/{id}', [ReviewController::class, 'update']);
  Route::delete('/delete/{id}', [ReviewController::class, 'delete']);
});


Route::post('/review_input', [ReviewController::class, 'store']);
Route::put('/review_update/{id}', [ReviewController::class, 'update']);
Route::delete('/review_delete/{id}', [ReviewController::class, 'delete']);
