@extends('layouts.master')
@section('content')

<h1>Login</h1>
<br/>
<div class="col-md-6">

    {{ Form::open(['action'=>'AuthController@processLogin', 'class' => 'form-horizontal']) }}

    {{ Form::textField('email_or_username', 'Email or Username', null) }}

    {{ Form::passwordField('password', 'Password', null) }}

    <div class="form-group">
    <a href="{{ URL::to('password/remind') }}" class="pull-right">Forgot password?</a>
    <label>{{ Form::checkbox('remember') }} Remember me</label>
    </div>

    <a href="{{ URL::to('sign-up') }}" class="btn btn-default pull-right">Sign up for new account</a>

    {{ Form::submitField('Login' ,'btn btn-success') }}

    {{ Form::close() }}

</div>

@stop