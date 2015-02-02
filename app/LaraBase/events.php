<?php

// Log last login for User
Event::listen('auth.login', function($user)
{
    $user->throttle->last_login = new DateTime;
    $user->throttle->ip_address = Request::getClientIp();
    $user->throttle->save();
});

// Log last activity for Authenticated user
Event::listen('last.activity', function($user)
{
    $user->throttle->last_activity = new DateTime;
    $user->throttle->save();
});

// Revoke suspension of user account
Event::listen('user.revoke_suspend', function($data)
{
    DB::table('throttle')->whereUserId($data)->update(['suspended' => FALSE, 'attempts' => '0']);
});

// Send notification email to Admin when a Post is created
Event::listen('post.created', function($data)
{
    Mail::send('emails.notifications.report_created', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Post Created');
    });
});

// Send notification email to Admin when Feedback form is submitted
Event::listen('feedback.submitted', function($data)
{
    Mail::send('emails.notifications.feedback', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Feedback');
    });
});