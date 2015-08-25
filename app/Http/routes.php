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

use Carbon\Carbon;
use Illuminate\Support\Facades\App;

Route::get('/', function() {

    if (Auth::check()) {
        return redirect()->action('DashboardController@index');
    }
    else {
        return view('home.home');
    }
});

// Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password Reset Routes
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/reset', 'Auth\PasswordController@postEmail');

Route::get('dashboard', 'DashboardController@index');

Route::get('account/settings', 'AccountController@getSettings');
Route::group(['as' => 'account::'], function() {
    Route::patch('account/userinfo', ['as' => 'updateUserInfo', 'uses' => 'AccountController@updateUserInfo']);
    Route::patch('account/emailpass', ['as' => 'updateEmailPass', 'uses' => 'AccountController@updateEmailPass']);
});

// Drives Routes
Route::resource('drives', 'DrivesController');

// Vehicles Routes
Route::resource('vehicles', 'VehiclesController');

Route::resource('supervisors', 'SupervisorsController');


Route::get('sitemap', function() {
    $sitemap = App::make("sitemap");

    $routes = Route::getRoutes();
    foreach($routes as $route) {
        if(in_array('GET', $route->methods())) {

            // Filter URIs
            $uri = $route->getUri();
            if(!preg_match('/\{.+\}/', $uri) && ! preg_match('/_debugbar/', $uri)) {
                $sitemap->add($route->getUri(), Carbon::yesterday(), '0.9', 'daily');
            }
        }
    }

    return $sitemap->render('xml');
});


