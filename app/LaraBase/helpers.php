<?php

// Set Active state for current Navigation links
// Used in views>layouts>navigation.blade.php
function active($path, $active = 'active')
{
    return Request::is($path) ? $active : null;
}

// Generate the Gravatar url for given email
// Used in posts>show.blade.php and user>profile_public.blade.php
function gravatar_url($email, $size = "150")
{
    if($size == null) {
        return 'http://www.gravatar.com/avatar/'.md5($email) ;
    }
    return 'http://www.gravatar.com/avatar/'. md5($email) .'?s='. $size ;
}

// Generate the url for given Image
// Used in user>profile.blade.php
function image_url($filename)
{
    return asset('/uploads/avatars/'. $filename);
}

// Generate back button
// Used in post.edit, post.create, deleted_users, settings_edit, profile_edit, feedback
function cancel_button($text = "Cancel")
{
    return "<a href=' " . URL::previous() . " ' class='btn btn-default pull-right'>$text</a>";
}