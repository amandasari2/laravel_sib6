<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/percobaan_pertama', function () {
    return view('hello');
});
