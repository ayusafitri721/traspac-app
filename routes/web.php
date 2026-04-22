<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitKerjaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('pegawai', PegawaiController::class)->except(['show']);
    Route::get('pegawai-print', [PegawaiController::class, 'print'])->name('pegawai.print');
    Route::get('unit-kerja-tree', [UnitKerjaController::class, 'index'])->name('unit-kerja.tree');
});
