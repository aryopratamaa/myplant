<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/tanaman', function () {
    return view('tanaman');
});

Route::get('/event', function () {
    return view('event');
});