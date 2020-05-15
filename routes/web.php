<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
    Route::get('/', 'LoadsController@index');
    Route::get('/from/{city}', 'LoadsController@dispatchCityLoads');
});
