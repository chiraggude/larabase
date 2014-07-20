@extends('layouts.master')
@section('content')

<h1>Register</h1>
<br/>
<div class="col-md-6">

    {{ Form::open(array('action' => 'UserController@processRegister','class' => 'form-horizontal')) }}

    {{ Form::textField('username', 'Username', null) }}

    {{ Form::emailField('email', 'Email', null) }}

    {{ Form::passwordField('password', 'Password', null) }}

    {{ Form::passwordField('password_confirm', 'Confirm your Password', null) }}

    {{ Form::submitField('Create new Account') }}

    {{ Form::close() }}

</div>

@stop
