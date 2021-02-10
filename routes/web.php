<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'users'], function () {

    /**
     * Users
     */
    Route::get('/', 'User\UserController@index');

    /**
     * Registration
     */
    Route::get('/register', 'User\UserRegistrationController@index');
    Route::post('/register', 'User\UserRegistrationController@store');
});

Route::group(['prefix' => 'network-abuse'], function () {

    /**
     * Reporting
     */
    Route::post('/report', 'AbuseReporting\AbuseReportingController@reportNetworkAbuse');
    Route::get('/check', 'AbuseReporting\AbuseReportingController@checkReportByIP');


});


