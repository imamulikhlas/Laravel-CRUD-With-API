<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KontrakController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::get('/jabatan/{id}', [JabatanController::class, 'show'])->name('jabatan.show');
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak.index');
Route::get('/kontrak/{id}', [KontrakController::class, 'show'])->name('kontrak.show');
Route::delete('/kontrak/{id}', [KontrakController::class, 'destroy'])->name('kontrak.destroy');
