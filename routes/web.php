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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::group(['prefix' => 'users'], function () {

    /**
     * Registration
     */
    Route::get('/register', 'User\RegisterUserController@create');
    Route::post('/register', 'User\RegisterUserController@store');

    /**
     * Login
     */
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    /**
     * Password
     */
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ForgotPasswordController@reset')->name('password.update');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    /**
     * Update User Details
     */
    Route::get('/edit/{userId}', 'User\UpdateUserController@show');
    Route::post('/edit', 'User\UpdateUserController@store');

    /**
     * Users
     */
    Route::get('/{username}', 'User\UserController@index');
    Route::get('/', 'User\UserController@index');

});

Route::group(['prefix' => 'network-abuse'], function () {

    /**
     * Reporting
     */
    Route::post('/report', 'AbuseReporting\AbuseReportingController@reportNetworkAbuse');
    Route::get('/report', 'AbuseReporting\AbuseReportingController@reportNetworkAbuseForm');

    /**
     * View Records
     */
    Route::get('/check', 'AbuseReporting\AbuseReportingController@getReports');
    Route::get('/check/ip/', 'AbuseReporting\AbuseReportingController@checkReportByIP');
    Route::get('/check/ip/{ip}', 'AbuseReporting\AbuseReportingController@checkReportByIP');
    Route::get('/check/user', 'AbuseReporting\AbuseReportingController@checkAbuseReportRecordByUsername');
    Route::get('/check/user/{username}', 'AbuseReporting\AbuseReportingController@checkAbuseReportRecordByUsername');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
