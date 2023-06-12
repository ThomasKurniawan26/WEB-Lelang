<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyrakatController;
use App\Http\Controllers\DataLelangController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DataBarangLelangController;

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

//Route masyrakat
Route::view('/registrasi','Masyrakat.Registrasi-Masyarakat');
Route::post('/registrasi/proses',[MasyrakatController::class,'prosesRegistrasi']);

Route::get('/',[DataBarangLelangController::class,'index']);
Route::get('detail-lelang/{lelang}',[DataBarangLelangController::class,'detailLelang']);
Route::post('penawaran/{lelang}',[DataBarangLelangController::class,'nominalPenawaran']);
/*
|ROUTE LOGIN|
 */
//ROUTE MASYARAKAT
Route::get('/login',[LoginController::class,'index']) -> name('login');
Route::post('/login/proses',[LoginController::class,'proses']) -> name('proses');
Route::get('/logout',[LoginController::class,'logout']) -> name('logout');

// ROUTE PETUGAS
Route::get('/login-administrator',[LoginAdminController::class,'index']) -> name('administrator');
Route::get('/administrator/logout',[LoginAdminController::class,'logout']) -> name('logout');
Route::post('/administrator/proses',[LoginAdminController::class,'proses']) -> name('proses');

Route::middleware('auth.administrator')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('Dashboard'); 
});

Route::middleware('auth.administrator')->group(function () {
    Route::get('/master-admin',[AdminController::class,'index'])->name('master-admin');
    Route::get('/master-admin/insert',[AdminController::class,'insert'])->name('tambah-admin');
    Route::get('/master-admin/delete/{petugas}',[AdminController::class,'delete'])->name('hapus-admin');
    Route::get('/master-admin/update/{petugas}',[AdminController::class,'update'])->name('ubah-admin');
    Route::post('/master-admin/prosesUpdate/{petugas}',[AdminController::class,'prosesUpdate'])->name('proses');
    Route::post('/master-admin/prosesInsert',[AdminController::class,'prosesInsert'])->name('proses');    
});


// ROUTE MASTER BARANG
Route::middleware('auth.administrator')->group(function () {
    Route::get('/master-barang',[BarangController::class,'index'])->name('master-barang');
    Route::get('/master-barang/insert',[BarangController::class,'insert'])->name('tambah-barang');
    Route::get('/master-barang/delete/{barang}',[BarangController::class,'delete'])->name('hapus-barang');
    Route::get('/master-barang/update/{barang}',[BarangController::class,'update'])->name('ubah-barang');
    Route::post('/master-barang/prosesUpdate/{barang}',[BarangController::class,'prosesUpdate'])->name('proses');
    Route::post('/master-barang/prosesInsert',[BarangController::class,'prosesInsert'])->name('proses');
});

// ROUTE DATA LELANG
Route::middleware('auth.administrator')->group(function () {
    Route::get('/data-lelang',[DataLelangController::class,'index'])->name('data-lelang');
    Route::get('/data-lelang/insert',[DataLelangController::class,'insert'])->name('tambah-lelang');
    Route::get('/data-lelang/delete/{lelang}',[DataLelangController::class,'delete'])->name('hapus-lelang');
    Route::get('/data-lelang/update/{lelang}',[DataLelangController::class,'update'])->name('ubah');
    Route::post('/data-lelang/prosesUpdate/{lelang}',[DataLelangController::class,'prosesUpdate'])->name('proses');
    Route::post('/data-lelang/prosesInsert',[DataLelangController::class,'prosesInsert'])->name('proses'); 
    Route::get('/data-lelang/cetak',[DataLelangController::class,'cetak']);
});
