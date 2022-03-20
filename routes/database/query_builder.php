<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

/** RUNNING DATABSE QUERIES */
// Retrieving All Rows From A Table
Route::get('/retrieve', [HomeController::class, 'getData']);
// Retrieving A Single Row / Column From A Table
Route::get('/retrieve-single', [HomeController::class, 'getSingle']);
// Retrieving A List Of Column Values
Route::get('/column-values', [HomeController::class, 'columnValues']);
// chunking results
Route::get('/chunk-results', [HomeController::class, 'chunkResults']);
// Streaming Results Lazily
// Aggregates


/** SELECT STATEMENTS */
Route::get('/select-stmnt', [HomeController::class, 'selectStmnt']);

/** RAW EXPRESSIONS */
Route::get('/rawexp', [HomeController::class, 'rawExp']);

/** JOINS */

/** UNIONS */

/** BASIC WHERE CLAUSE */

/** ADVANCED WHERE CLAUSE */

/** ORDERING, GROUPING, LIMIT AND OFFSET */

/** CONDITIONAL CLAUSES */

/** INSERT STATEMENTS */
// insert
Route::get('/insert', [HomeController::class, 'insert']);
// auto-incrementing ids
Route::get('/auto-increment', [HomeController::class, 'autoincrement']);
// upserts

/** UPDATE STATEMENTS */

/** DELETE STATEMENTS */

/** PESSIMISTIC LOCKING */

/** DEBUGGING */
