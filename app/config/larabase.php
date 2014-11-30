<?php

return [

    // All Notifications will go to the Admin email by default
    'admin_email' => getenv('ADMIN_EMAIL'),

    // Countdown time will be activated once the app is in maintenance mode
    'maintenance_time' => getenv('MAINTENANCE_TIME')

];