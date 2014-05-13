@extends('layouts.master')
@section('content')

<h1>Register</h1>

<div class="col-md-6">
{{ Form::open(array('action' => 'AuthController@processRegister','class' => 'form-horizontal')) }}

    {{ Form::textField('username', 'Username', null) }}

    {{ Form::emailField('email', 'Email', null) }}

    {{ Form::passwordField('password', 'Password', null) }}

    {{ Form::passwordField('password_confirm', 'Confirm your Password', null) }}

    <div class="form-group">
    {{ Form::submit('Create new Account', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
</div>
@stop
