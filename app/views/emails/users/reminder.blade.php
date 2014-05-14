@extends('layouts.emails.master')
@section('content')

    <h1>Hi, {{ $user->username }}</h1>
    <p class="lead">We have sent you this email because you requested a password reset for your account at LaraBase</p>

    <h2>Reset your Password</h2>
    <p>Access the following link to change your password</p>
    <a class="btn" href="{{ URL::to('password/reset', array($token)) }}">Reset your password now</a>

    <p>Thanks</p>
    <p>LaraBase</p>

    <br/>
    <br/>

@stop