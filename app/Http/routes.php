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

/*HOME*/
Route::get('/', 'Auth\AuthController@getLogin');

/*USERS*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/* DASHBOARD */
Route::get('dashboard', [
    'as'  => 'dashboard',
    'middleware' => 'auth',
    'uses' => 'DashboardController@index'
]);

/*USER*/
Route::get('user', [
    'as'  => 'user',
    'middleware' => 'auth',
    'uses' => 'UserController@index'
]);

/*CAMPAIN*/

Route::resource('campain', 'CampainController');
//
// Route::get('campain', [
//     'as'  => 'campain',
//     'middleware' => 'auth',
//     'uses' => 'CampainController@index'
// ]);
//
// Route::get('campain/optAdd', 'CampainController@optAdd');

/*COMPANY*/
Route::resource('company', 'CompanyController', ['before' => 'auth']);

//Route::get('company/optAdd', 'CompanyController@optAdd');

Route::get('process/{campain_id}', [
    'as'            => 'process',
    'middleware'    => 'auth',
    'uses'          => 'CampainController@processAdvert'
]);

/*TEST*/
Route::get('test', [
    'as'  => 'test',
    'middleware' => 'auth',
    'uses' => 'UserController@index'
]);

/*REPORT*/
Route::get('report', [
    'as'  => 'report',
    'middleware' => 'auth',
    'uses' => 'UserController@index'
]);

Route::get('report_campains', [
    'as'  => 'report_campains',
    'middleware' => 'auth',
    'uses' => 'ReportController@campains'
]);
Route::get('report_companies', [
    'as'  => 'report_companies',
    'middleware' => 'auth',
    'uses' => 'ReportController@companies'
]);
