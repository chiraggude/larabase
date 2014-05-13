@extends('layouts.master')
@section('content')

<h1>Edit Profile</h1>

<div class="col-md-6">

{{Form::model($user, array('action'=> array('AccountController@profileSave','$user->id'),'class' => 'form-horizontal'))}}

    {{ Form::textField('first_name', 'First Name', 'John') }}

    {{ Form::textField('last_name', 'Last Name', 'Doe') }}

    <div class="form-group{{ $errors->has('username') ? ' has-error' : null }}">
        <label class="control-label">Username</label>
        {{ Form::text('username', null, array('class' => 'form-control', 'disabled')) }}
        <p class="help-block">{{ $errors->first('username') }}</p>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : null }}">
        <label for="email" class="control-label">Email</label>
            {{ Form::email('email', null, array('class' => 'form-control', 'disabled')) }}
            <p class="help-block">{{ $errors->first('email') }}</p>
    </div>

    <div class="form-group">
            {{ Form::submit('Save Profile', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
</div>
@stop
