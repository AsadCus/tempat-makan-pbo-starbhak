<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\PesananController;
// use App\Http\Controllers\Api\RestoController;

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

Route::get('/', [AuthController::class, 'tes'])->name('tes');

// ========================================= Login ===================================================
Route::get('/login', [AuthController::class, 'index'])->name('index');
Route::post('/login/proses', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================================= Auth ===================================================
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'cek_login:admin'], function () {
        Route::get('/dashboard/admin', [HomeController::class, 'index'])->name('dashboard.admin');
        Route::get('/dashboard/admin/menu', [MenuController::class, 'index'])->name('dashboard.admin.menu');
        Route::get('/dashboard/admin/meja', [MejaController::class, 'index'])->name('dashboard.admin.meja');
        Route::get('/dashboard/admin/user', [UserController::class, 'index'])->name('dashboard.admin.user');
        Route::get('/dashboard/admin/pesanan', [PesananController::class, 'index'])->name('dashboard.admin.pesanan');
    });
    Route::group(['middleware' => 'cek_login:manajer'], function () {
        Route::get('/dashboard/manajer', [HomeController::class, 'index'])->name('dashboard.admin');
        Route::get('/dashboard/manajer/menu', [MenuController::class, 'index'])->name('dashboard.manajer.menu');
        Route::get('/dashboard/manajer/meja', [MejaController::class, 'index'])->name('dashboard.manajer.meja');
    });
    Route::group(['middleware' => 'cek_login:staff'], function () {
        Route::get('/dashboard/staff', [HomeController::class, 'index'])->name('dashboard.staff');
        Route::get('/dashboard/staff/menu', [MenuController::class, 'index'])->name('dashboard.staff.menu');
        Route::get('/dashboard/staff/meja', [MejaController::class, 'index'])->name('dashboard.staff.meja');
        Route::get('/dashboard/staff/pesanan', [PesananController::class, 'index'])->name('dashboard.staff.pesanan');
    });
});

// Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.edit');
// Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.delete');

// ========================================= Menu ===================================================
Route::post('/menu/deactive/{id}', [MenuController::class, 'deactive'])->name('deactive.menu');
Route::post('/menu/store', [MenuController::class, 'store'])->name('store.menu');
Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('store.update');
Route::delete('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('delete.menu');

// ========================================= Meja ===================================================
Route::post('/meja/deactive/{id}', [MejaController::class, 'deactive'])->name('deactive.meja');
Route::post('/meja/store', [MejaController::class, 'store'])->name('store.meja');
Route::delete('/meja/delete/{id}', [MejaController::class, 'destroy'])->name('delete.meja');

// ========================================= User ===================================================
Route::post('/user/store', [UserController::class, 'store']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
Route::post('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/update/{id}', [UserController::class, 'update']);

// ========================================= Pesanan ===================================================
Route::get('/pesanan/show/{id}', [PesananController::class, 'show']);
Route::get('/pesanan/store', [PesananController::class, 'store']);
Route::post('/pesanan/bayar/{id}', [PesananController::class, 'bayar']);

// ========================================= Resto ===================================================
Route::put('/resto/update/{id}', [RestoController::class, 'update'])->name('update.resto');
 