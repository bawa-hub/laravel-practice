<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/** Interacting with the request */

// Accessing the request
Route::get('/request', function (Request $request) {
    dd($request);
});

// Request path and method
Route::get('/request-path', function (Request $request) {
    $uri = $request->path();
    dd($uri);
});
Route::get('/request-url', function (Request $request) {
    $url = $request->url();
    $urlWithQueryString = $request->fullUrl();
    dd($url);
});
Route::get('/request-method', function (Request $request) {
    dd($request->method());
});

// Request headers

// Request IP Address
Route::get('/request-ip', function (Request $request) {
    dd($request->ip());
});

// Content negotiation
// PSR-7 requests

/** Input */

// Retrieving input
Route::get('/request-input-form', function () {
    return view('testform');
});
Route::post('/request-input', function (Request $request) {
    // dd($request->all()); // request inputs data as array
    // dd($request->collect()); // request inputs data as collection
    // dd($request->input('name')); // retrieve user input
    dd($request->input('marks', 100)); // retrieve default input if not present
})->name('request.input');

// determining if input is present
// merging additional input
// old input
// cookies
// input trimming and normalization

/** Files */

// Retrieving uploaded files
// storing uploaded files

/** Creating Responses */

// attaching headers to responses
// attaching cookies to responses
// cookies and encryption

/** Redirects */

// redirectin to named routes
// redirecting to controller actions
// redirecting to external domains
// redirecting with flashed session data

/** Other Response types */

// view responses
// json responses
// file downloads
// file responses

/** Response macros */
