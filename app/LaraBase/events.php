<?php

Event::listen('report.created', function($data)
{
    Mail::send('emails.notifications.report_created', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'LaraBase Admin')->subject('Notification - Report Created');
    });
});


Event::listen('feedback.submitted', function($data)
{
    Mail::send('emails.notifications.feedback', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'LaraBase Admin')->subject('Notification - Feedback');
    });
});