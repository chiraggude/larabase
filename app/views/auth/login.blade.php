@extends('layouts.master')
@section('content')

<h1>Login</h1>

<div class="col-md-6">

    {{ Form::open(array('action'=>'UserController@processLogin', 'class' => 'form-horizontal')) }}

    {{ Form::emailField('email', 'Email', null) }}

    {{ Form::passwordField('password', 'Password', null) }}

    <div class="form-group">
    <a href="{{ URL::to('password/remind') }}" class="pull-right">Forgot password?</a>
    <label>{{ Form::checkbox('remember') }} Remember me</label>
    </div>

    <div class="form-group">
    {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
    <a href="{{ URL::to('register') }}" class="btn btn-success pull-right">Sign up for new account</a>
    </div>

    {{ Form::close() }}

</div>

@stop