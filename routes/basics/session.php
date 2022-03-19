<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// retrieving data
Route::get('/', function (Request $request) {
    echo $request->session()->get('key');
    echo $request->session()->get('key', 'default');
    echo $request->session()->get('key', function () {
        return 'default from closure';
    });
});

// The Global Session Helper
Route::get('/home', function () {
    // Retrieve a piece of data from the session...
    $value = session('key');
    echo $value;

    // Specifying a default value...
    $value = session('key', 'default');
    echo $value;
});

Route::get('/store', function () {
    // Store a piece of data in the session...
    session(['key' => 'value']);
    echo session('key');
});

// retrieving all session data
Route::get('/all', function (Request $request) {
    $data = $request->session()->all();
    var_dump($data);
});
