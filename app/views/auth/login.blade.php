@extends('layouts.master')
@section('content')

<h1>Login</h1>

<div class="col-md-6">

    {{ Form::open(array('action'=>'UserController@processLogin', 'class' => 'form-horizontal')) }}

    {{ Form::textField('email_or_username', 'Email or Username', null) }}

    {{ Form::passwordField('password', 'Password', null) }}

    <div class="form-group">
    <a href="{{ URL::to('password/remind') }}" class="pull-right">Forgot password?</a>
    <label>{{ Form::checkbox('remember') }} Remember me</label>
    </div>

    <a href="{{ URL::to('register') }}" class="btn btn-success pull-right">Sign up for new account</a>

    {{ Form::submitField('Login') }}

    {{ Form::close() }}

</div>

@stop