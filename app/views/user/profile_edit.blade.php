@extends('layouts.master')
@section('content')

<h1>Edit Profile</h1>

<div class="col-md-6">

    {{ Form::model($user, ['action'=> ['AccountController@profileSave'],'class' => 'form-horizontal']) }}

    {{ Form::textField('first_name', 'First Name', '') }}

    {{ Form::textField('last_name', 'Last Name', '') }}

    {{ Form::textField('username', 'Username', '') }}

    {{ Form::emailField('email', 'Email', '') }}

    <a href="{{ URL::to('password/change') }}" class="btn btn-default pull-right"><i class="fa fa-lock"></i> Change Account Password</a>

    {{ Form::submitField('Save Profile') }}

    {{ Form::close() }}

</div>

@stop
