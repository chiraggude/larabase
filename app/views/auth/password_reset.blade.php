@extends('layouts.master')
@section('content')

<h1>Set your new Password</h1>
<div class="col-md-6">

{{ Form::open(['class' => 'form-horizontal']) }}

{{ Form::hidden('token', $token) }}

{{ Form::emailField('email', 'Your Email', null) }}

{{ Form::passwordField('password', 'New Password', null) }}

{{ Form::passwordField('password_confirmation', 'Confirm New Password', null) }}

<div class="form-group">
    {{ Form::submit('Reset', ['class' => 'btn btn-primary']) }}
</div>

{{ Form::close() }}
</div>
@stop