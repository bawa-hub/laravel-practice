<?php

use App\Mail\SendMarkdownMail;
use App\Mail\SendTestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// not work with wifi with firewall like nikhil pg wifif 
Route::get('/sendmail', function () {
    Mail::send([], [], function ($msg) {
        $msg->to("test@test.com", "Bawa Vikram")
            ->subject('Laravel mail testing')
            ->setBody("Hi, This is a testing mail");
    });
    return "mail sent";
});

Route::get('/using-mailable', function () {
    Mail::to("test@test.com", "Bawa Vikram")->send(new SendTestMail());
    return "mail sent";
});

Route::get('/using-markdown', function () {
    Mail::to("test@test.com", "Bawa Vikram")->send(new SendMarkdownMail());
    return "mail sent";
});
