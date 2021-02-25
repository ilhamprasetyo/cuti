<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;

use App\Review;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    $review = Review::all();
    return view('index', ['review' => $review]);
})->name('index');

Route::middleware(['admin', 'auth'])->group(function () {
  Route::get('/pegawai', [PegawaiController::class, 'index']);
  Route::get('/pegawai/input', [PegawaiController::class, 'input']);
  Route::post('/pegawai/store', [PegawaiController::class, 'store']);
  Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
  Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
  Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'delete']);
  Route::get('/pegawai/search', [PegawaiController::class, 'search']);
  Route::get('/pegawai/profile/{id}', [PegawaiController::class, 'profile']);

  Route::get('/unit', [UnitController::class, 'index']);
  Route::get('/unit/input', [UnitController::class, 'input']);
  Route::get('/unit/store', [UnitController::class, 'store']);
  Route::get('/unit/edit/{id}', [UnitController::class, 'edit']);
  Route::get('/unit/update/{id}', [UnitController::class, 'update']);
  Route::get('/unit/hapus/{id}', [UnitController::class, 'delete']);
  Route::get('/unit/search', [UnitController::class, 'search']);

  Route::get('/jabatan', [JabatanController::class, 'index']);
  Route::get('/jabatan/input', [JabatanController::class, 'input']);
  Route::get('/jabatan/store', [JabatanController::class, 'store']);
  Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit']);
  Route::get('/jabatan/update/{id}', [JabatanController::class, 'update']);
  Route::get('/jabatan/hapus/{id}', [JabatanController::class, 'delete']);
  Route::get('/jabatan/search', [JabatanController::class, 'search']);

  Route::get('/pengajuan', [PengajuanController::class, 'index']);
});

Route::middleware(['user', 'auth'])->group(function () {
  Route::get('/pengajuan/input', [PengajuanController::class, 'input']);
  Route::get('/pengajuan/store', [PengajuanController::class, 'store']);
  Route::get('/pengajuan/edit/{id}', [PengajuanController::class, 'edit']);
  Route::get('/pengajuan/update/{id}', [PengajuanController::class, 'update']);
  Route::get('/pengajuan/hapus/{id}', [PengajuanController::class, 'delete']);
  Route::get('/pengajuan/search', [PengajuanController::class, 'search']);
  Route::get('/pengajuan/rincian/{id}', [PengajuanController::class, 'rincian']);
  Route::get('/pengajuan/batal/{id}', [PengajuanController::class, 'batal']);

  Route::get('/user', [HomeController::class, 'user']);

  Route::get('/change_password', [PegawaiController::class, 'change_password']);
  Route::post('/change_password', [PegawaiController::class, 'update_password']);
});

Route::get('/profile', [PegawaiController::class, 'profile'])->middleware('auth');

Route::get('/approval', [PengajuanController::class, 'approval'])->middleware('koordinator', 'auth');

Route::get('/check', [PegawaiController::class, 'check']);
Route::get('/request', [PegawaiController::class, 'request']);
Route::get('/checked', [PegawaiController::class, 'checked']);
Route::get('/register/{id}', [PegawaiController::class, 'register']);
Route::get('/registered', [PegawaiController::class, 'registered']);

Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes();

Route::get('/password/reset/{token}', function ($token) {
    return view('auth/passwords/reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/upload_photo/{id}', [PegawaiController::class, 'upload_photo']);
Route::get('/delete_photo/{id}', [PegawaiController::class, 'delete_photo']);

Route::get('/review', [ReviewController::class, 'store']);
