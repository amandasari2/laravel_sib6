<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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