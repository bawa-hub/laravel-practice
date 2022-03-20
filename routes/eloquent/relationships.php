<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('relationships')->group(function () {
    Route::get('/', function () {
        return "relationships";
    });

    /******************* Defining Relationships ****************/

    // one to one
    Route::get('/users', [HomeController::class, 'userProfiles']);
    Route::get('/profiles', [HomeController::class, 'profiles']);

    // one to many
    Route::get('/create-post', [HomeController::class, 'createPost']);
    Route::get('/postsByUserId', [HomeController::class, 'posts']);

    // one to many(inverse)/Belongs to 
    Route::get('/postUser', [HomeController::class, 'postUser']);

    // has one of many
    Route::get('/latest-post', [HomeController::class, 'latestPost']);
    Route::get('/oldest-post', [HomeController::class, 'oldestPost']);
    // has one through
    // has many through

    /************************** Many to Many Relationships ************/
    Route::get('/create-record', [HomeController::class, 'createRecords']);
    Route::get('/get-record', [HomeController::class, 'getRecords']);
    // Retrieving Intermediate Table Columns
    Route::get('/get-pivot-column', [HomeController::class, 'getPivotColumns']);

    /************************* Polymorphic relationships **************/
    // one-to-one (polymorphic)
    Route::get('/create-post-image', [HomeController::class, 'createPostImage']);
    Route::get('/create-user-image', [HomeController::class, 'createUserImage']);
    // one-to-many (polymorphic)
    Route::get('/create-post-comment', [HomeController::class, 'createPostComment']);
    Route::get('/create-video-comment', [HomeController::class, 'createVideoComment']);
    // one-of-many (polymorphic)
    // many-to-many (poloymorphic)
    Route::get('/create-post-tags', [HomeController::class, 'createPostTags']);
    Route::get('/create-video-tags', [HomeController::class, 'createVideoTags']);
    // custom polymorphic types

    /************************ Quering Relationships *******************/

    /************************ Aggregation Related Models **************/

    /************************ Eager Loading ****************************/

    /********************* Inserting and Updating Related Models *******/

    /************************* Dynamic Relationships ******************/
    // see documentation
    /******************** Touching parent timestamps *******************/
    // see documentation
});
