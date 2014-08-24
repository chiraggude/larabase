<?php

// Set Active state for current Navigation links
// Used in views>layouts>navigation.blade.php
function active($path, $active = 'active')
{
    return Request::is($path) ? $active : null;
}

// Generate the Gravatar url for given email
// Used in posts>show.blade.php and user>profile_public.blade.php
function gravatar_url($email, $size)
{
    if($size == null)
    {
        return 'http://www.gravatar.com/avatar/'.md5($email) ;
    }
    return 'http://www.gravatar.com/avatar/'. md5($email) .'?s='. $size ;
}

// Generate back button
// Used in post.edit, post.create, deleted_users, settings_edit, profile_edit, feedback
function cancel_button($text = 'Cancel')
{
    return "<a href=' ".URL::previous()." ' class='btn btn-default pull-right'>$text</a>";
}

// Check if authenticated user is Owner or Admin for given resource object
// Used in filters.php, posts.index, posts.user_index, posts.show
function is_owner_or_admin($user, $object)
{
    if( $user->id == $object->user_id || $user->id == '1' )
    {
        return true;
    }
    return false;
}

// Check if authenticated user is Admin
// Used in navigation.blade.php
function is_admin($user)
{
    if( $user->id == '1' )
    {
        return true;
    }
    return false;
}