@extends('layouts.master')
@section('content')

<h1>Edit Profile</h1>

<div class="col-md-6">

{{Form::model($user, array('action'=> array('AccountController@profileSave','$user->id'),'class' => 'form-horizontal'))}}

    {{ Form::textField('first_name', 'First Name', '') }}

    {{ Form::textField('last_name', 'Last Name', '') }}

    {{ Form::textField('username', 'Username', '') }}

    {{ Form::emailField('email', 'Email', '') }}

    <div class="form-group">
    {{ Form::submit('Save Profile', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
</div>
@stop
