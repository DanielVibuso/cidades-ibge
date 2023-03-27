<?php

use App\Http\Controllers\Api\CityController;
use Illuminate\Support\Facades\Route;

Route::prefix('/city')->group(function () {

    Route::controller(CityController::class)->group(function () {
        Route::get('/list', 'index')->name('getCities');
    });

});
