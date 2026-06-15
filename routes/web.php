<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('kategori', KategoriController::class);
Route::resource('plant', PlantController::class);
Route::resource('event', EventController::class);
Route::resource('dashboard', DashboardController::class);