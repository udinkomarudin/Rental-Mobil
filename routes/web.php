<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


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


Route::get('/', function () {
    return view('welcome');
});

// Rute Registrasi Pengguna
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute Manajemen Mobil
Route::resource('mobil', MobilController::class);


// Rute Peminjaman Mobil
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/mobil/{mobilId}/peminjaman', [PeminjamanController::class, 'create']);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);

// Rute Pengembalian Mobil
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::get('/mobil/{mobilId}/pengembalian', [PengembalianController::class, 'create']);
Route::post('/pengembalian', [PengembalianController::class, 'store']);