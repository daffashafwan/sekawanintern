<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Auth\AuthPenyetujuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PenyetujuController;
use App\Http\Controllers\Admin\PemesananController;

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

//AUTH ADMIN
    Route::prefix('auth/admin')->group(function () {
        Route::get('login', [AuthAdminController::class, 'index'])->name('auth.admin.index');
        Route::post('login', [AuthAdminController::class, 'login'])->name('auth.admin.login');
        Route::get('logout', [AuthAdminController::class, 'logout'])->name('auth.admin.logout');
    });


//AUTH PENYETUJU
Route::prefix('auth/penyetuju')->group(function () {
    Route::get('login', [AuthPenyetujuController::class, 'index'])->name('auth.penyetuju.index');
    Route::post('login', [AuthPenyetujuController::class, 'login'])->name('auth.penyetuju.login');
    Route::get('logout', [AuthPenyetujuController::class, 'logout'])->name('auth.penyetuju.logout');
});


Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::prefix('kendaraan')->group(function(){
        Route::get('/', [KendaraanController::class, 'index'])->name('admin.kendaraan.index');
        Route::post('/tambah', [KendaraanController::class, 'tambah'])->name('admin.kendaraan.tambah');
        Route::post('/edit', [KendaraanController::class, 'edit'])->name('admin.kendaraan.edit');
        Route::delete('/delete/{kid}', [KendaraanController::class, 'hapus'])->name('admin.kendaraan.hapus');
    });
    Route::prefix('driver')->group(function(){
        Route::get('/', [DriverController::class, 'index'])->name('admin.driver.index');
        Route::post('/tambah', [DriverController::class, 'tambah'])->name('admin.driver.tambah');
        Route::post('/edit', [DriverController::class, 'edit'])->name('admin.driver.edit');
        Route::delete('/delete/{did}', [DriverController::class, 'hapus'])->name('admin.driver.hapus');
    });
    Route::prefix('penyetuju')->group(function(){
        Route::get('/', [PenyetujuController::class, 'index'])->name('admin.penyetuju.index');
        Route::post('/tambah', [PenyetujuController::class, 'tambah'])->name('admin.penyetuju.tambah');
        Route::post('/edit', [PenyetujuController::class, 'edit'])->name('admin.penyetuju.edit');
        Route::delete('/delete/{pid}', [PenyetujuController::class, 'hapus'])->name('admin.penyetuju.hapus');
    });

    Route::prefix('pemesanan')->group(function(){
        Route::get('/', [PemesananController::class, 'index'])->name('admin.pemesanan.index');
        Route::post('/tambah', [PemesananController::class, 'tambah'])->name('admin.pemesanan.tambah');
        Route::post('/edit', [PemesananController::class, 'edit'])->name('admin.pemesanan.edit');
        Route::delete('/delete/{pid}', [PemesananController::class, 'hapus'])->name('admin.pemesanan.hapus');
    });
});
