<?php

use Illuminate\Support\Facades\Route;

/****
 * 1. Basic Routing
 */
Route::get('/', function () {
    return "routing routes";
});
// a. redirect routes
Route::redirect('/here', '/');
// b. view routes
Route::view('/view', 'welcome');
Route::view('/view1', 'test', ['name' => 'bawa']);



/***
 * 2. Route parameters
 */

// a. Required parameters
Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'post ' . $postId . ' comment ' . $commentId;
});
// parameters and dependency injection
Route::get('/user1/{id}', function (Request $request, $id) {
    return 'User ' . $id;
});

// b. Optional parameters
Route::get('/user2/{name?}', function ($name = null) {
    return $name;
});
Route::get('/user3/{name?}', function ($name = 'John') {
    return $name;
});

// c. Regular Expression Constraints


/**
 * 3. Named Routes
 */

Route::get('/use4/profile', function () {
    return 'profile page';
})->name('profile');

Route::get('/generate-routes', function () {
    // Generating URLs...
    $url = route('profile');

    // Generating Redirects...
    return redirect()->route('profile');
});

Route::get('/user5/{id}/profile', function ($id) {
    return 'profile 1 ' . $id;
})->name('profile1');

Route::get('/generate-routes1', function () {
    // Generating URLs...
    $url = route('profile1', ['id' => 1]);
    // Generating Redirects...
    return redirect()->route('profile1', 1);
});

// inspecting current routes



/***
 * 4. Route Groups
 */

//  a. Middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/mycontent', function () {
        return 'mycontent';
    });
});

// b. Subdomain Routing

// c. Route prefixes
Route::prefix('myprefix')->group(function () {
    Route::get('/users', function () {
        // Matches The "/myprefix/users" URL
        return 'myprefiz users';
    });
});

// d. Route name prefixes
Route::name('myprefix.')->group(function () {
    Route::get('/users', function () {
        // Route assigned name "myprefix.users"...
        return "hi";
    })->name('users');
});

/***
 * 5. Route model binding
 */

//  a. Implicit binding
// b. Explicit binding


/***
 * 7. Rate limiting
 */

//  a. Defining Rate limiters
// b. Attaching Rate limiters to Routes

/***
 * 8. Form method spoofing
 */


/***
 * 9. Accessing the current route
 */


/***
 * 10. CORS (cross-origin resourse sharing)
 */


/***
 * 11. Route caching
 */

/***
 * 6. Fallback routes
 */
Route::fallback(function () {
    return 'fallback';
}); // The fallback route should always be the last route registered by your application.
