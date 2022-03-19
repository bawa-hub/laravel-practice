<?php

use App\Models\User;
use App\Notifications\DatabaseNotification;
use App\Notifications\OrderShippedNotification;
use Illuminate\Support\Facades\Route;

/**
 * create notification:
 * php artisan make:notification NotificationName
 * 
 */

Route::get('/notify', function () {
    $user = User::findOrFail(1);
    $user->notify(new OrderShippedNotification());
    echo "notified";
});

// using ['mail']
// note: in notification class also implements ShouldQueue
Route::get('/notify-with-queue', function () {
    $user = User::findOrFail(1);
    $user->notify((new OrderShippedNotification())->delay(5));
    echo "notified";
});

// using ['database']
/**
 * generate notification table:
 * php artisan notification:table
 * php artisan migrate
 */
Route::get('/notify-with-database', function () {
    $user = User::findOrFail(1);
    $user->notify(new DatabaseNotification());
    echo "notified";
});
