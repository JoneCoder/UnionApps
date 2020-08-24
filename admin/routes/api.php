<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/geo/code', [
    'uses' => 'Geography\GeoCodeController@geoInit'
]);

Route::middleware('api')->post('/geo/code', [
    'uses' => 'Geography\GeoCodeController@getLocation'
]);

