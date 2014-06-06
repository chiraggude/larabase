<?php

// ID's accross all routes should be integers (parameter constraints on a global level)
// Regex \d+ means 1 or more digits
Route::pattern('id', '\d+');

// Filter every POST, PUT, DELETE request for the CSRF token (Patter based Filter)
Route::when('*', 'csrf', array('post', 'put', 'delete'));


// RESTful resources
Route::resource('reports', 'ReportsController');


// Only Authenticated users can access these routes
Route::group(['before' => 'auth'], function()
{
    Route::get('dashboard',         'AccountController@dashboard');
    Route::get('users/{username}',  'AccountController@profilePublic');
    Route::get('profile',           'AccountController@profile');
    Route::get('settings',          'AccountController@settings');
    Route::get('password/change',   'AccountController@passwordChange');
    Route::post('password/change',  'AccountController@passwordSave');
    Route::get('profile/edit',      'AccountController@profileEdit');
    Route::post('profile/edit',     'AccountController@profileSave');
    Route::get('users',             'UserController@index');
    Route::get('logout',            'UserController@logout');
});


// Admin Routes
Route::group(['before' => 'auth|admin','prefix' => 'admin'], function()
{
    Route::get('users',       'AdminController@users');
});


// Only Guests can access these Routes
Route::group(['before' => 'guest'], function()
{
    Route::get( 'login',                  'UserController@login');
    Route::post('login',                  'UserController@processLogin');
    Route::get( 'register',               'UserController@register');
    Route::post('register',               'UserController@processRegister');
    Route::get( 'activate/{code}',        array('as'=>'activate', 'uses' => 'UserController@activate'));
    Route::controller('password',         'RemindersController');
});


// Public Routes
Route::get('feedback',      'HomeController@feedbackShow');
Route::post('feedback',      'HomeController@feedbackSave');
Route::get('faqs',        'HomeController@faqs');
Route::get('about',        'HomeController@about');
Route::get('/',             'HomeController@home');


// Developer Routes
Route::get('hello',         'DevController@hello');
