<?php

// ID's accross all routes should be integers. No need to ->where('id', '\d+')
// Route::pattern() allows us to define parameter constraints on a global level.
Route::pattern('id', '\d+');

// RESTful resources
Route::resource('reports', 'ReportsController');

// Only Authenticated users can access these routes
Route::group(['before' => 'auth'], function()
{
    Route::get('dashboard',         'AccountController@dashboard');
    Route::get('profile',           'AccountController@profile');
    Route::get('settings',          'AccountController@settings');
    Route::get('users',             'UsersController@index');
    Route::get('users/{username}',  'UsersController@publicProfile');
    Route::get('logout',            'AuthController@logout');
    Route::get('password/change',   'AccountController@passwordChange');
    Route::get('profile/edit',      'AccountController@profileEdit');
    // All post routes should be protected from CSRF
    Route::group(['before' => 'csrf'], function()
    {
        Route::post('profile/edit',     'AccountController@profileSave');
        Route::post('password/change',  'AccountController@passwordSave');
    });
});


// Only Guests can access these Routes
Route::group(['before' => 'guest'], function()
{
    Route::get( 'login',                       'AuthController@login');
    Route::get( 'register',                    'AuthController@register');
    Route::get( 'activate/{code}',              array('as'=>'activate', 'uses' => 'AuthController@activate'));
    Route::controller('password',              'RemindersController');
    // All post routes should be protected from CSRF
    Route::group(['before' => 'csrf'], function()
    {
        Route::post('login',                  'AuthController@processLogin');
        Route::post('register',               'AuthController@processRegister');
    });
});


// Public Routes
Route::get('/',             'HomeController@home');
Route::get('/contact',      'HomeController@contact');
Route::get('/about',        'HomeController@about');

// Developer Routes
Route::get('hello',         'DevController@hello');
Route::get('checkpass',         'DevController@password');

