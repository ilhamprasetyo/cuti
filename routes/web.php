<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\CompanyController;

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
  $review = DB::table('review')->orderBy('id','desc')->paginate(3);
  $all_review = Review::all();
  return view('index', ['review' => $review, 'all_review' => $all_review]);
})->name('index');

Route::get('/test', function () {
  return view('test');
})->name('test');

Route::middleware(['admin', 'auth'])->group(function () {
  Route::get('/pegawai', [PegawaiController::class, 'index']);
  Route::post('/pegawai/store', [PegawaiController::class, 'store']);
  Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
  Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'delete']);

  Route::get('/unit', [UnitController::class, 'index']);
  Route::get('/unit/store', [UnitController::class, 'store']);
  Route::get('/unit/update/{id}', [UnitController::class, 'update']);
  Route::get('/unit/hapus/{id}', [UnitController::class, 'delete']);

  Route::get('/jabatan', [JabatanController::class, 'index']);
  Route::get('/jabatan/store', [JabatanController::class, 'store']);
  Route::get('/jabatan/update/{id}', [JabatanController::class, 'update']);
  Route::get('/jabatan/hapus/{id}', [JabatanController::class, 'delete']);

  Route::get('/pengajuan', [PengajuanController::class, 'index']);
});

Route::middleware(['karyawan', 'auth'])->group(function () {
  Route::post('/pengajuan/store', [PengajuanController::class, 'store']);
  Route::post('/pengajuan/update/{id}', [PengajuanController::class, 'update']);
  Route::get('/pengajuan/hapus/{id}', [PengajuanController::class, 'delete']);
  Route::get('/pengajuan/rincian/{id}', [PengajuanController::class, 'rincian']);

  Route::get('/pengajuan/download/{id}', [PengajuanController::class, 'download']);

  Route::get('/change_password', [PegawaiController::class, 'change_password']);
  Route::post('/change_password', [PegawaiController::class, 'update_password']);
});

Route::middleware(['koordinator', 'auth'])->group(function () {
  Route::get('/approval', [KoordinatorController::class, 'approval']);
  Route::get('/karyawan', [KoordinatorController::class, 'karyawan']);
  Route::get('/pengajuan/status/{id}', [KoordinatorController::class, 'status']);
  Route::get('/pengajuan/batal/{id}', [KoordinatorController::class, 'batal']);
});

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

Route::middleware(['user', 'auth'])->group(function () {
  Route::post('/upload_photo/{id}', [UserController::class, 'upload_photo']);
  Route::get('/delete_photo/{id}', [UserController::class, 'delete_photo']);
  Route::post('/profile/update/{id}', [UserController::class, 'update']);
  Route::get('/user', [UserController::class, 'user']);
  Route::get('/profile', [UserController::class, 'profile']);
});

Route::post('/review_input', [ReviewController::class, 'store']);

Route::get('/company', [CompanyController::class, 'view'])->name('company.index');
Route::get('/companies', [CompanyController::class, 'get_company_data'])->name('data');
Route::get('/addcompany', [CompanyController::class, 'view'])->name('company.view');
Route::post('/addcompany', [CompanyController::class, 'Store'])->name('company.store');
Route::delete('/addcompany/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('/addcompany/{id}/edit', [CompanyController::class, 'update'])->name('company.update');
