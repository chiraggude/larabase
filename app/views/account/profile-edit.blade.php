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
                {{ Form::open(['action'=> ['ProfileController@personalInfo']]) }}

                {{ Form::textField('first_name', 'First Name', 'First Name', $user->profile->first_name) }}

                {{ Form::textField('last_name', 'Last Name', 'Last Name', $user->profile->last_name) }}

                {{ Form::textField('location', 'Location', 'Location', $user->profile->location) }}

                {{ Form::submitField('Save Personal Info', 'btn btn-default') }}

                {{ Form::close() }}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Avatar</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ image_url($user->profile->avatar_filename) }}" alt="{{ $user->full_name }}" class="img-thumbnail" width="250" height="250">
                    </div>
                    <div class="col-md-6">
                        {{ Form::open(['action'=> ['ProfileController@avatarUpload'], 'files' => true]) }}

                        {{ Form::fileField('avatar', 'Upload new Avatar image. Maximum file size: 2 mb') }}

                        <br>

                        {{ Form::submitField('Save Profile Picture', 'btn btn-default') }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Account Info</h3>
            </div>
            <div class="panel-body">
                {{ Form::model($user, ['action'=> ['ProfileController@accountInfo']]) }}

                {{ Form::textField('username', 'Username') }}

                {{ Form::emailField('email', 'Email') }}

                {{ Form::submitField('Save Account Info', 'btn btn-default') }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop
