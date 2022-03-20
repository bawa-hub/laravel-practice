<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// dbSchema -- https://app.dbdesigner.net/designer/schema/491173
Route::get('/', [HomeController::class, 'index']);

/****************** RETRIEVING MODELS ***********************/
Route::get('/getUsers', [HomeController::class, 'getUsers']);
// binding queries
Route::get('/get-users-with-queries', [HomeController::class, 'getUserWithQueries']);
// collections
// chunking results
// streaming results lazily
// cursors
// advanced subqueries

/*********************** RETRIEVING SINGLE MODELS/AGGREGATES *******/
Route::get('/retrieve-sinlge-model', [HomeController::class, 'retrieveSingleModel']);
Route::get('/retrieve-sinlge-model-with-no-value', [HomeController::class, 'retrieveSingleModelWithNoValue']);
// not found exceptiojns
Route::get('/not-found', [HomeController::class, 'notFound']);
// retrieving aggregates
Route::get('/aggregates', [HomeController::class, 'aggregates']);

/******************* INSERTING AND UPDATING MODELS ***********/
Route::get('/insertUser', [HomeController::class, 'insertUser']);
// inserts
// updates
// mass assignment
// upserts

/*********************** DELETING MODELS ************************/
Route::get('/delete-user', [HomeController::class, 'deleteUser']);
// soft deleting
// quering soft deletes

/************************* QUERY SCOPES *************************/
// Global scopes
// Local scopes
Route::get('/activeUser', [HomeController::class, 'activeUser']);

/**************************** EVENTS *****************************/
// using closures
// observers
// muting events

/************************* PRUNING MODELS ***********************/
// see documentation
/************************* REPLICATIONG MODELS ******************/
// see documentation
/*************************** COMPARING MODELS *******************/
// see documentation
