<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/geo/code/divisions', [
    'uses' => 'Geography\GeoCodeController@geoDivisionInit'
]);

Route::middleware('api')->get('/geo/code/districts', [
    'uses' => 'Geography\GeoCodeController@geoDistrictInit'
]);

Route::middleware('api')->post('/geo/code', [
    'uses' => 'Geography\GeoCodeController@getLocation'
]);

