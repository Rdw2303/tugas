<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsernameController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;

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

Route::get('/h', function () {
    return view('welcome');
});

//transaksi
Route::get('/',[TransaksiController::class,'index'])->name('Transaksi/index');
Route::get('/tambah',[TransaksiController::class,'tambah']);
Route::get('/hapus{id}',[TransaksiController::class,'hapus']);
Route::post('/create',[TransaksiController::class,'create']);
Route::get('edit/{id}',[TransaksiController::class,'edit']);
Route::post('update/{id}',[TransaksiController::class,'editData']);

//username
Route::get('/username',[UsernameController::class,'index']);
Route::get('/tambahUser',[UsernameController::class,'tambah']);
Route::post('/createUser',[UsernameController::class,'create']);
Route::get('/hapusUser/{id}',[UsernameController::class,'hapus']);
Route::get('/editUser/{id}',[UsernameController::class,'edit']);
Route::post('/updateUser/{id}',[UsernameController::class,'editData']);

//barang
Route::get('/barang',[BarangController::class,'index']);
Route::get('/tambahBrg',[BarangController::class,'tambah']);
Route::post('/createBrg',[BarangController::class,'create']);
Route::get('/hapusBrg/{id}',[BarangController::class,'hapus']);
Route::get('/editBrg/{id}',[BarangController::class,'edit']);
Route::post('/updateBrg/{id}',[BarangController::class,'editData']);

//detail
Route::get('/detail',[DetailController::class,'index']);
Route::get('/tambahDtl',[DetailController::class,'tambah']);
Route::post('/createDtl',[DetailController::class,'create']);
Route::get('/hapusDtl/{id}',[DetailController::class,'hapus']);
Route::get('/editDtl/{id}',[DetailController::class,'edit']);
Route::post('/updateDtl/{id}',[DetailController::class,'editData']);
