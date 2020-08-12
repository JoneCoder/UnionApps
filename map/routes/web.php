<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false,
    'verify' => true
]);

Route::get('/home', [
    'uses'  => 'HomeController@index',
    'as'    => 'home'
])->middleware('verified', 'password.confirm');

Route::get('/admin/registration', [
    'uses'  => 'Auth\RegisterController@showRegistrationForm',
    'as'    => 'registration'
]);

/* After create dashboard add auth middleware */

Route::post('/admin/registration', [
    'uses'  => 'Auth\RegisterController@register'
]);
