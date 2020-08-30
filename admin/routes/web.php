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
    Route::get('/slider', [
        'uses'  => 'Settings\Union\UnionSliderController@index',
        'as'    => 'union.slider'
    ]);
    Route::post('/slider', [
        'uses'  => 'Settings\Union\UnionSliderController@store',
        'as'    => 'union.addSlide'
    ]);
    Route::post('/slider/get', [
        'uses'  => 'Settings\Union\UnionSliderController@getSlide'
    ]);
    Route::post('/slider/update', [
        'uses'  => 'Settings\Union\UnionSliderController@updateSlide',
        'as'    => 'union.updateSlide'
    ]);
    Route::post('/slider/sequence', [
        'uses'  => 'Settings\Union\UnionSliderController@updateSequence'
    ]);
    Route::get('/slider/status/{id}', [
        'uses'  => 'Settings\Union\UnionSliderController@updateStatus',
        'as'    => 'union.changeSliderStatus'
    ]);
    Route::post('/slider/delete', [
        'uses'  => 'Settings\Union\UnionSliderController@deleteSlide',
        'as'    => 'union.deleteSlide'
    ]);
    Route::get('/committee', [
        'uses'  => 'Settings\Union\UnionCommitteeController@index',
        'as'    => 'union.committee'
    ]);
});
