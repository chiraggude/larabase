@extends('layouts.emails.master')
@section('content')

    <h1>Hi, {{ $username }}</h1>
        <p>Thanks for creating a new account at LaraBase</p>

    <h2>Account Activation</h2>
        <p>Please access the link below to activate your account.</p>
        <strong><a href="{{ $link }}">Activate your Account</a></strong>

    <br/>
    <br/>
    <p>Thanks</p>
    <p>LaraBase</p>
    <br/>
    <br/>

@stop
