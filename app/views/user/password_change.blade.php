@extends('layouts.master')
@section('content')

<h1>Change Password</h1>

<div class="col-md-6">

    {{ Form::open(array('action'=> 'AccountController@passwordSave','class' => 'form-horizontal')) }}

    {{ Form::passwordField('current_password', 'Current Password', null) }}

    {{ Form::passwordField('new_password', 'New Password', null) }}

    {{ Form::passwordField('new_password_confirmation', 'Confirm New Password', null) }}

    {{ cancel_button() }}

    {{ Form::submitField('Save new Password') }}

    {{ Form::close() }}

</div>

@stop