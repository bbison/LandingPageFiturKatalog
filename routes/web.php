<?php
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\MidtransController;










use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\ProdukController;



Route::get('/admin', [mainController::class ,'login']);
Route::get('/logout', [mainController::class ,'logout']);
Route::post('/login', [mainController::class ,'prosesLogin']);
Route::get('/dashboard', [mainController::class ,'dashboard']);
Route::resource('/produk',ProdukController::class);
Route::resource('/kategori',kategoryController::class);
Route::get('/file', [mainController::class ,'getfile']);
Route::post('/hapus-foto-produk', [ProdukController::class ,'hapusFotoProduk']);
Route::get('/', [mainController::class ,'home']);
Route::get('/product', [mainController::class ,'index']);
Route::get('/logout', [mainController::class ,'logout']);
Route::get('/login', [mainController::class ,'loginUser'])->name('login');
Route::get('/panel', [mainController::class ,'panel'])->middleware('auth');
Route::get('/lihat-produk/{id}', [ProdukController::class ,'lihatProduk']);










Route::get('/checkout', [PesananController::class ,'checkout'])->middleware('auth');
Route::Post('/checkout', [PesananController::class ,'createSnapToken'])->middleware('auth');
Route::get('/midtrans/notification', [midtransController::class ,'handleNotification']);
Route::get('/midtrans/notification/finish', [midtransController::class ,'finish']);
Route::resource('/penerima',PenerimaController::class);
Route::resource('/pesanan',PesananController::class);
Route::resource('/keuangan',KeuanganController::class);
Route::get('/pembayaran', [PesananController::class ,'pembayaran']);
Route::get('/masukan-keranjang', [mainController::class ,'masukanKeranjang']);
Route::get('/register', [mainController::class ,'registerUser']);
Route::post('/register', [mainController::class ,'prosesRegisterUser']);
