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

Route::get('/', function () {
    return view('layouts.main');
});

Route::group(['prefix' => 'users'], function () {

    /**
     * Users
     */
    Route::get('/', 'User\UserController@index');
    Route::get('/{username}', 'User\UserController@index');

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

    /**
     * View Records
     */
    Route::get('/check', 'AbuseReporting\AbuseReportingController@getReports');
    Route::get('/check/ip/', 'AbuseReporting\AbuseReportingController@checkReportByIP');
    Route::get('/check/ip/{ip}', 'AbuseReporting\AbuseReportingController@checkReportByIP');
    Route::get('/check/user', 'AbuseReporting\AbuseReportingController@checkAbuseReportRecordByUsername');
    Route::get('/check/user/{username}', 'AbuseReporting\AbuseReportingController@checkAbuseReportRecordByUsername');
});


