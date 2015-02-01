@extends('layouts.master')
@section('content')
<h1>Profile</h1>

<hr>

<div class="row">
    <div class="col-md-3">
        <a href="{{ URL::to('users/'.$user->username) }}">
            <img src="{{ image_url($user->profile->avatar_filename) }}" alt="{{ $user->full_name }}" class="img-thumbnail" width="240" height="240">
        </a>
        <br><br>
        <a href="{{ URL::action('UsersController@profile', $user->username) }}" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> View Public Profile</a>
    </div>
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-body">
                <h3>Username: {{ $user->username }}</h3>
                <h3>Email: {{ $user->email }}</h3>
                <h3>Name: {{ $user->full_name }}</h3>
                <h3>Location: {{ $user->profile->location }}</h3>
            </div>
        </div>

        <a href="{{ URL::to('profile/edit') }}" class="btn btn-default btn-sm pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
    </div>
</div>

@stop