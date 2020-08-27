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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/union', 'middleware' => ['role:Super Admin', 'auth']], function (){
    Route::get('/list', [
        'uses'  => 'Admin\UnionSetupController@showUnion',
        'as'    => 'admin.unionSetup'
    ]);
    Route::post('/list', [
        'uses'  => 'Admin\UnionSetupController@unions'
    ]);
    Route::get('/setup', [
        'uses'  => 'Admin\UnionSetupController@showUnionSetupForm',
        'as'    => 'admin.addUnion'
    ]);
    Route::post('/setup', [
        'uses'  => 'Admin\UnionSetupController@createUnion',
        'as'    => 'admin.addUnion'
    ]);
    Route::get('/edit/{id}', [
        'uses'  => 'Admin\UnionSetupController@showUnionEditForm',
        'as'    => 'admin.editUnion'
    ]);
    Route::post('/edit', [
        'uses'  => 'Admin\UnionSetupController@update',
        'as'    => 'admin.updateUnion'
    ]);
    Route::get('/deactivate/activate/{id}', [
        'uses'  => 'Admin\UnionSetupController@deactivateOrActivate',
        'as'    => 'admin.deactivateOrActivateUnion'
    ]);
    Route::get('/citizen/registration', [
        'uses'  => 'Admin\UnionSetupController@showUnionEditForm',
        'as'    => 'admin.citizenRegistration'
    ]);
});

Route::group(['prefix' => '/union', 'middleware' => ['auth']], function (){
    Route::get('/profile', [
        'uses'  => 'Settings\Union\UnionProfileController@index',
        'as'    => 'union.unionProfile'
    ]);
    Route::post('/profile', [
        'uses'  => 'Settings\Union\UnionProfileController@update',
        'as'    => 'union.update'
    ]);
});
