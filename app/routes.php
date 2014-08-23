<?php

// ID's accross all routes should be integers (parameter constraints on a global level)
// Regex \d+ means 1 or more digits
Route::pattern('id', '\d+');

// Filter every POST, PUT, DELETE request for the CSRF token (Patter based Filter)
Route::when('*', 'csrf', array('post', 'put', 'delete'));

// RESTful resources
Route::resource('posts', 'PostController');


// Admin Routes
Route::group(['before' => 'auth|admin','prefix' => 'admin'], function()
{
    Route::get('users',             'AdminController@users');
    Route::get('deleted-users',     'AdminController@deletedUsers');
    Route::post('restore-user',     'AdminController@restoreUser');
    Route::get('posts',             'AdminController@posts');
    Route::get('api/posts',         'AdminController@postsApi');
});


// Routes for Authenticated Users
Route::group(['before' => 'auth'], function()
{
    Route::get('dashboard',                 'AccountController@dashboard');
    Route::get('users/{username}/posts',    'PostController@indexForUser');
    Route::get('users/{username}',          'AccountController@profilePublic');
    Route::get('profile',                   'AccountController@profile');
    Route::get('settings',                  'AccountController@settings');
    Route::get('settings/edit',             'AccountController@settingsEdit');
    Route::post('settings/edit',            'AccountController@settingsSave');
    Route::get('password/change',           'AccountController@passwordChange');
    Route::post('password/change',          'AccountController@passwordSave');
    Route::get('profile/edit',              'AccountController@profileEdit');
    Route::post('profile/edit',             'AccountController@profileSave');
    Route::post('delete-account',           'AccountController@deleteAccount');
    Route::get('users',                     'UserController@index');
    Route::get('logout',                    'UserController@logout');
});


// Guest Routes
Route::group(['before' => 'guest'], function()
{
    Route::get( 'login',                  'UserController@login');
    Route::post('login',                  'UserController@processLogin');
    Route::get( 'register',               'UserController@register');
    Route::post('register',               'UserController@processRegister');
    Route::controller('password',         'RemindersController');
    Route::get('activate/{code}',         ['as'=>'activate', 'uses' => 'UserController@activate']);
    Route::get('resend-activation',       'UserController@resendActivation');
    Route::post('resend-activation',      'UserController@resendActivationCode');
});


// Public Routes
Route::get('feedback',      'HomeController@feedbackShow');
Route::post('feedback',     'HomeController@feedbackSave');
Route::get('faqs',          'HomeController@faqs');
Route::get('about',         'HomeController@about');
Route::get('/',             'HomeController@home');


// Developer Routes
Route::get('hello',         'DevController@hello');

// Display all SQL executed in Eloquent if Debug mode is set to true
/*if (Config::get('app.debug')) {
    Event::listen('illuminate.query', function($query)
    {
        var_dump($query);
    });
}*/