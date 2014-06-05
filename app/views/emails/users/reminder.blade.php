@extends('layouts.emails.master')
@section('content')

    <h1>Hi, {{ $user->username }}</h1>
        <p>We have sent you this email because you requested a password reset for your account at LaraBase</p>

    <h2>Reset your Password</h2>
        <p>Access the following link to change your password</p>
        <strong><a href="{{ URL::to('password/reset', array($token)) }}">Reset your password now</a></strong>
        <p>This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.</p>
    <br/>
    <br/>
    <p>Thanks</p>
    <p>LaraBase</p>
    <br/>
    <br/>

@stop
