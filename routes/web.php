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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::post('/loginact', [AuthController::class, 'loginact']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/home', function () {
    return view('pages.beranda');
});

Route::get('/siswas', [PageController::class, 'siswa']);