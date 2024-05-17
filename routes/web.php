<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\JenisProdukController;
use App\HTTP\Controllers\ProdukController;
use App\HTTP\Controllers\KartuController;
use App\HTTP\Controllers\PelangganController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('front.home');
});

Route::get('/percobaan_pertama', function () {
    return view('hello');
});

// contoh routing yang mengarahkan ke dirinya sendiri, tanpa view ataupun controller
Route::get('/salam', function () {
    return "<h1>Selamat Pago Peserta MSIB</h1>";
});

// Contoh routing yang menggunakan parameter
Route::get('/staff/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai' . $nama . '<br> Departemen :' . $divisi;
});

Route::get('/daftar_nilai', function () {
    // Return view yang mengarahkan ke dalam view yang di dalamnya ada folder nilai dan file daftar_nilai
    return view('nilai.daftar_nilai');
});

Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

// prefix and gruoping adalah mengelompokkan routing ke satu jenis route
Route::prefix('admin')->group(function(){
// Route memanggil controller setiap fungsi
// nanti linknya menggunakan url, ada di dalam view
Route::get('/jenis_produk', [JenisProdukController::class, 'index']);
Route::post('/jenis_produk/store',[JenisProdukController::class, 'store']);

// rute dengan pemanggilan class
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);

Route::get('/kartu',[KartuController::class,'index']);
Route::post('/kartu/store',[KartuController::class,'store']);

});


