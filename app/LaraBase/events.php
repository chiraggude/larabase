<?php

// Log last activity timestamp for Authenticated users
Event::listen('last.activity', function($user)
{
    $user->updated_at = new DateTime;
    $user->save();
});

// Send notification email to Admin when a Post is created
Event::listen('report.created', function($data)
{
    Mail::send('emails.notifications.report_created', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Report Created');
    });
});

// Send notification email to Admin when Feedback is submitted
Event::listen('feedback.submitted', function($data)
{
    Mail::send('emails.notifications.feedback', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Feedback');
    });
});