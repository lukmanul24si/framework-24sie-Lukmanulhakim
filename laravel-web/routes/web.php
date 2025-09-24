<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
})->name('pcr.show');

Route::get('/mahasiswa/{param1}',[MahasiswaController::class,'show'] )->name('mahasiswa.show');
Route::get('/nama/{param1?}/{nim?}' , function ($param1='', $nim='') {

    return 'nama saya :' .$param1. '<br> nim saya :' .$nim;
})->name('mahasiswa.show');

Route::get('/about', function () {
    return view('halaman-about');
});
