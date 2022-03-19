<?php

use Illuminate\Support\Facades\Route;

// see storage/logs/laravel.log file
Route::get('/logging', function () {
    return view('welcome');
})->middleware('log.request');
