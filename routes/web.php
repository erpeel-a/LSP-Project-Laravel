<?php

use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return redirect(route('karyawan'));
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('create.karyawan');
Route::post('/karyawan/create', [KaryawanController::class, 'store'])->name('store.karyawan');
Route::get('/karyawan/{id}', [KaryawanController::class, 'edit'])->name('edit.karyawan');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('update.karyawan');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('destroy.karyawan');

Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan');
Route::get('/golongan/create', [GolonganController::class, 'create'])->name('create.golongan');
Route::post('/golongan/create', [GolonganController::class, 'store'])->name('store.golongan');
Route::get('/golongan/{id}', [GolonganController::class, 'edit'])->name('edit.golongan');
Route::put('/golongan/{id}', [GolonganController::class, 'update'])->name('update.golongan');
Route::delete('/golongan/{id}', [GolonganController::class, 'destroy'])->name('destroy.golongan');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('create.transaksi');
Route::post('/transaksi/create', [TransaksiController::class, 'store'])->name('store.transaksi');
Route::get('/transaksi/{id}', [TransaksiController::class, 'edit'])->name('edit.transaksi');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('update.transaksi');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('destroy.transaksi');
