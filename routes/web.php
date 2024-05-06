<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'Admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');



    Route::get('/admin/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::post('/admin/addPasien', [AdminController::class, 'addPasien'])->name('admin.addPasien');
    Route::post('/admin/updatePasien', [AdminController::class, 'updatePasien'])->name('admin.updatePasien');
    Route::get('/admin/deletePasien/{id}', [AdminController::class, 'deletePasien'])->name('admin.deletePasien');
    
    Route::post('/admin/addPasienBalita', [AdminController::class, 'addPasienBalita'])->name('admin.addPasienBalita');
    Route::post('/admin/updatePasienBalita', [AdminController::class, 'updatePasienBalita'])->name('admin.updatePasienBalita');
    Route::get('/admin/deletePasienBalita/{id}', [AdminController::class, 'deletePasienBalita'])->name('admin.deletePasienBalita');
    
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
});

Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/addLaporan', [UserController::class, 'addLaporan'])->name('user.addLaporan');
    Route::post('/user/addLaporanPost', [UserController::class, 'addLaporanPost'])->name('user.addLaporanPost');
    // Rute-rute yang memerlukan autentikasi pengguna biasa
});


