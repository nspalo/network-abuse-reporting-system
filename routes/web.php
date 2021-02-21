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
//    return view('layouts.main');
//});

Route::group(['prefix' => 'users'], function () {

    /**
     * Registration
     */
    Route::get('/register', 'User\RegisterUserController@create');
    Route::post('/register', 'User\RegisterUserController@store');

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


/**
 *  SB Admin 2 Templates
 */
Route::group(['prefix' => 'sb-admin'], function () {

    Route::get('/', function () {
        return view('sb-admin-templates.dashboard');
    });

    Route::group(['prefix' => 'auth'], static function () {

        Route::get('/login', function () {
            return view('sb-admin-templates.login');
        });

        Route::get('/register', function () {
            return view('sb-admin-templates.register');
        });

        Route::get('/forgot-password', function () {
            return view('sb-admin-templates.forgot-password');
        });
    });

    Route::group(['prefix' => 'pages'], static function () {

        Route::get('/dashboard', function () {
            return view('sb-admin-templates.dashboard');
        });

        Route::get('/404', function () {
            return view('sb-admin-templates.404');
        });

        Route::get('/blank', function () {
            return view('sb-admin-templates.blank');
        });

        Route::get('/charts', function () {
            return view('sb-admin-templates.charts');
        });

        Route::get('/tables', function () {
            return view('sb-admin-templates.tables');
        });
    });

    Route::group(['prefix' => 'components'], static function () {
        Route::get('/buttons', function () {
            return view('sb-admin-templates.components.buttons');
        });

        Route::get('/cards', function () {
            return view('sb-admin-templates.components.cards');
        });
    });

    Route::group(['prefix' => 'utilities'], static function () {

        Route::get('/colors', function () {
            return view('sb-admin-templates.utilities.colors');
        });

        Route::get('/borders', function () {
            return view('sb-admin-templates.utilities.borders');
        });

        Route::get('/animations', function () {
            return view('sb-admin-templates.utilities.animations');
        });

        Route::get('/others', function () {
            return view('sb-admin-templates.utilities.others');
        });
    });

});
