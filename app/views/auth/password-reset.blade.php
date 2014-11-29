@extends('layouts.master')
@section('content')

<h1>Set your new Password</h1>

<div class="col-md-6">

    {{ Form::open(['class' => 'form-horizontal']) }}

    {{ Form::hidden('token', $token) }}

    {{ Form::emailField('email', 'Confirm your Email', null) }}

    {{ Form::passwordField('password', 'New Password', null) }}

    {{ Form::passwordField('password_confirmation', 'Confirm New Password', null) }}

    {{ Form::submitField('Save new Password') }}

    {{ Form::close() }}

</div>

@stop