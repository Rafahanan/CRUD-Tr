<?php

use Illuminate\Support\Facades\Route;

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
// Chart Bulanan

Route::resource('/barang', App\Http\Controllers\BarangController::class);
Route::resource('/detailTransaksi', App\Http\Controllers\detailTransaksiController::class);
Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);
Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'chart'])->name('chart')->middleware('SuperAdmin');
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index')->middleware('SuperAdmin');
Route::get('/laporan/filter', [App\Http\Controllers\LaporanController::class, 'filter'])->name('laporan.filter')->middleware('SuperAdmin');



