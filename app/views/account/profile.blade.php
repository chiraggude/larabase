@extends('layouts.master')
@section('content')
<h1>Profile</h1>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="well well-sm">
            <div class="media">
              <div class="media-left">
                <a href="{{ URL::to('users/'.$user->username) }}">
                    <img src="{{ image_url($user->profile->avatar_filename) }}" alt="{{ $user->full_name }}" class="img-thumbnail media-object" width="220" height="220">
                </a>
              </div>
              <div class="media-body">
                <h3><span class="text-muted">Name:</span> {{ $user->full_name }}</h3>
                <h3><span class="text-muted">Username:</span> {{ $user->username }}</h3>
                <h3><span class="text-muted">Email:</span> {{ $user->email }}</h3>
                <h3><span class="text-muted">Location:</span> {{ $user->profile->location }}</h3>
              </div>
            </div>
        </div>
        <a href="{{ URL::to('profile/edit') }}" class="btn btn-default btn-sm pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
        <a href="{{ URL::action('UsersController@profile', $user->username) }}" class="btn btn-primary btn-sm pull-left"><i class="fa fa-user"></i> View Public Profile</a>
    </div>
</div>

@stop