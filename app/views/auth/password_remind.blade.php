@extends('layouts.master')
@section('content')

<h1>Reset Password</h1>
<div class="col-sm-6">
    {{ Form::open(['class' => 'form-horizontal']) }}

    {{ Form::emailField('email', 'Your Email', null) }}

    <div class="form-group">
        {{ Form::submit('Send Password Reset email', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@stop