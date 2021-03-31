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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/review_view', [ReviewController::class, 'index']);
Route::post('/review_input', [ReviewController::class, 'store']);
Route::put('/review_update/{id}', [ReviewController::class, 'update']);
Route::delete('/review_delete/{id}', [ReviewController::class, 'delete']);
