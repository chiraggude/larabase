@extends('layouts.master')
@section('content')

<h1>Reset Password</h1>

<p class="text-muted">Enter the email address you used to sign up and we'll send you a link to reset your password.</p>

<div class="col-sm-6">

    {{ Form::open(['class' => 'form-horizontal']) }}

    {{ Form::emailField('email', 'Your Email', null) }}

    {{ Form::submitField('Send Password Reset email') }}

    {{ Form::close() }}

</div>

@stop