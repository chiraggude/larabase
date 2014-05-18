@extends('layouts.master')
@section('content')

<h1>Reset Password</h1>

<div class="col-sm-6">

    {{ Form::open(['class' => 'form-horizontal']) }}

    {{ Form::emailField('email', 'Your Email', null) }}

    {{ Form::submitField('Send Password Reset email', 'btn btn-primary') }}

    {{ Form::close() }}

</div>

@stop