<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
    Route::get('/', 'LoadsController');
    Route::get('/from/{city}', 'LoadsController');
});
