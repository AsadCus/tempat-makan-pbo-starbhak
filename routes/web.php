<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

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

// Route::get('/', function () {
//     return view('layout');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
//     return view('parsial.home');
// });

// ========================================= Login ===================================================
Route::get('/login', [AuthController::class, 'index'])->name('index');
Route::post('/login/proses', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================================= Auth ===================================================
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'cek_login:admin'], function () {
        Route::get('/dashboard/admin', [HomeController::class, 'index'])->name('dashboard.admin');
        Route::get('/dashboard/admin/menu', [MenuController::class, 'index'])->name('dashboard.admin.menu');
    });
    Route::group(['middleware' => 'cek_login:manajer'], function () {
        Route::get('/dashboard/manajer', [HomeController::class, 'index'])->name('dashboard');
    });
    Route::group(['middleware' => 'cek_login:kasir'], function () {
        Route::get('/dashboard/kasir', [HomeController::class, 'index'])->name('dashboard');
    });
});



