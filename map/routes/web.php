<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/geography/division', [
    'uses'  => 'Geography\DivisionController@showDivisions',
    'as'    => 'divisions'
])->middleware('can:AddDivision');
