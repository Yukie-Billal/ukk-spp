<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

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
Route::middleware('guest:petugas,siswa')->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('/loginact', [AuthController::class, 'loginact']);
});
Route::middleware('auth:petugas,siswa')->group(function () {
    Route::get('/beranda', [PageController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::middleware('Admin')->group(function () {
        Route::get('/siswa', [PageController::class, 'siswa']);
        Route::get('/petugas', [PageController::class, 'petugas']);
        Route::get('/kelas', [PageController::class, 'kelas']);
        Route::get('/spp', [PageController::class, 'spp']);
        Route::get('/laporan', [PageController::class, 'laporan']);
    });
    Route::middleware('Petugas')->group(function () {
        
    });
    Route::get('/pembayaran', [PageController::class, 'pembayaran']);
    Route::get('/history-pembayaran', [PageController::class, 'history_pembayaran']);
});