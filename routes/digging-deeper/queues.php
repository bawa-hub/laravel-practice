<?php

use App\Jobs\SendDataJob;
use App\Jobs\SendTestMailJob;
use App\Mail\SendTestMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Learn Queues and Jobs";
});

/**
 * php artisan queue - list all available commands
 * 
 * queue using databse driver:
 * QUEUE_CONNECTION=database in .env
 * 
 * create migration for jobs -
 * php artisan queue:table
 * php artisan migrate
 * php artisan queue:work
 * 
 * two ways to use queue:
 */

//  1. using closure method
Route::get('/mail-with-queue', function () {
    dispatch(function () {
        Mail::to("test@test.com", "Bawa Vikram")->send(new SendTestMail());
    })->delay(now()->addSeconds(3));
    return "mail sent";
});

// 2. using jobs
/**
 * php artisan make:job AnyJobName
 * code your task in job handle() method
 */
Route::get('/mail-queue-with-jobs', function () {
    // dispatch(new SendTestMailJob())->delay(now()->addSeconds(3));
    // OR
    SendTestMailJob::dispatch()->delay(now()->addSeconds(3));
    return "mail sent done";
});

// send data 
Route::get('/jobs-with-data', function () {
    $user = User::findOrFail(1);
    SendDataJob::dispatch($user)->delay(now()->addSeconds(3));
    return "mail sent done with dynamic email";
});
