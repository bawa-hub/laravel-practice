<?php

use App\Events\SomeoneCheckedProfile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/**
 * generate event:
 * php artisan make:event EventName
 * 
 * generate listener:
 * php artisan make:listener ListenerName --event=EventName
 * 
 * register in EventServiceProvider
 */

//  using job
Route::get('/create-event', function () {
    // $user = User::create(['name' => "Bawa vikram", "email" => "test@test.com", 'password' => "1376734"]);
    $user = User::findOrFail(1);
    // event(new SomeoneCheckedProfile($user));
    // or
    SomeoneCheckedProfile::dispatch($user);
    echo $user->name;
});
