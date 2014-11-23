@extends('layouts.master')
@section('content')

<h1>Resend Activation Code</h1>

<div class="col-sm-6">

    {{ Form::open(array('action' => 'UserController@resendActivationCode','class' => 'form-horizontal')) }}

    {{ Form::emailField('email', 'Your Email', null) }}

    {{ Form::submitField('Send Activation email') }}

    {{ Form::close() }}

</div>

@stop