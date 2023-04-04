<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

// route untuk mengambil semua data pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');

// route untuk mengambil data pegawai berdasarkan ID
Route::get('/pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');

// route untuk menambah data pegawai baru
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

// route untuk mengupdate data pegawai berdasarkan ID
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');

// route untuk menghapus data pegawai berdasarkan ID
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');