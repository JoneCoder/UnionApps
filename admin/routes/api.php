<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/geo/code', [
    'uses' => 'Geography\GeoCodeController@geoInit'
]);

