<?php

use Illuminate\Support\Facades\Route;

Route::get('/middleware', function () {
    return "middleware";
})->middleware('testing');
