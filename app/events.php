<?php

//Event::listen('report.created', 'NotificationHandler@reportCreated');

class NotificationHandler {

    public function reportCreated($data)
    {
        Mail::send('emails.notifications.report_created', $data, function($message)
        {
            $message->to('turizon1@gmail.com', 'John Smith')->subject('Notification - Report Created');
        });
    }

}