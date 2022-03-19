<?php

use App\Services\AwesomeServiceInterface;
use Illuminate\Support\Facades\Route;

// dump(app());

// register implementation in AppServiceProvicer
Route::get('/serviceprovider', function (AwesomeServiceInterface $awesome_service) {
    $awesome_service->doAwesomeThing();
});
