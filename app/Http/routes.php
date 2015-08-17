<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Admin Routes
Route::get('admin', ['middleware' => ['auth', 'admin'], function() {
    return view('admin.index');
}]);

Route::get('dashboard', 'DashboardController@index');

// Drives Routes
Route::resource('drives', 'DrivesController');

// Vehicles Routes
Route::resource('vehicles', 'VehiclesController');

Route::resource('supervisors', 'SupervisorsController');

