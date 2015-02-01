@extends('layouts.master')
@section('content')

<h1>Edit Profile</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Personal Info</h3>
            </div>
            <div class="panel-body">

                {{ Form::open(['action'=> ['AccountController@personalInfo']]) }}

                {{ Form::textField('first_name', 'First Name', 'First Name', $user->profile->first_name) }}

                {{ Form::textField('last_name', 'Last Name', 'Last Name', $user->profile->last_name) }}

                {{ Form::textField('location', 'Location', 'Location', $user->profile->location) }}

                {{ Form::submitField('Save Personal Info') }}

                {{ Form::close() }}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Avatar</h3>
            </div>
            <div class="panel-body">

            <img src="{{ image_url($user->profile->avatar_filename) }}" alt="{{ $user->full_name }}" class="img-thumbnail" width="240" height="240">

            {{ Form::open(['action'=> ['AccountController@avatarUpload'], 'files' => true]) }}

            <br>

            {{ Form::fileField('avatar', 'Upload new Avatar image') }}

            <br>

            {{ Form::submitField('Save Profile Picture') }}

            {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="well">
            <h3>Account Info</h3>

            {{ Form::model($user, ['action'=> ['AccountController@accountInfo']]) }}

            {{ Form::textField('username', 'Username') }}

            {{ Form::emailField('email', 'Email') }}

            {{ Form::submitField('Save Account Info') }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
