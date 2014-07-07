<?php

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/

// Application Environment is set as defined by the APP_ENV variable on the web server
// If not defined, Application Environment is set to local by default

$env = $app->detectEnvironment(function()
{
    return getenv('APP_ENV') ?: 'local';
});