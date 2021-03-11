<?php

use App\Http\Controllers\{GolonganController, KaryawanController, TransaksiController};
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

Route::resources([
    'karyawan' => KaryawanController::class,
    'golongan' => GolonganController::class,
    'transaksi' => TransaksiController::class
]);