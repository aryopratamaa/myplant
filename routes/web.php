<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

Route::resource('kategori', KategoriController::class);
Route::resource('plant', PlantController::class);
Route::resource('event', EventController::class);
Route::resource('dashboard', DashboardController::class);
