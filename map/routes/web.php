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

/*  User Middleware
    $permissions = ['NewLocation', 'AddDivision', 'AddDistrict', 'AddUpazila', 'AddCityCorporation', 'AddUnion', 'AddMunicipal', 'AddPolicestation', 'AddPostoffice', 'AddVillage', 'AddWard', 'AddRoad', 'AddHouse', 'UpdateLocation', 'UpdateDivision', 'UpdateDistrict', 'UpdateUpazila', 'UpdateCityCorporation', 'UpdateUnion', 'UpdateMunicipal', 'UpdatePolicestation', 'UpdatePostoffice', 'UpdateVillage', 'UpdateWard', 'UpdateRoad', 'UpdateHouse', 'ViewLocation', 'SearchHouse', 'Help', 'Setting', 'LayoutSetting', 'Notification'];
    ->middleware('can:NewLocation')
 */

Auth::routes([
    'register' => false,
    'verify' => true
]);

Route::get('/home', [
    'uses'  => 'HomeController@index',
    'as'    => 'home'
])->middleware('verified');

Route::get('/admin/registration', [
    'uses'  => 'Auth\RegisterController@showRegistrationForm',
    'as'    => 'registration'
])->middleware('password.confirm', 'can:AddUser');

Route::post('/admin/registration', [
    'uses'  => 'Auth\RegisterController@register'
])->middleware('password.confirm', 'can:AddUser');
