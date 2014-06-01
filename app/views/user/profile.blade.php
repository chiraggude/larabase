@extends('layouts.master')
@section('content')
<a href="{{ URL::to('profile/edit') }}" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
<h1>Your Profile</h1>
<hr>
<div class="row">
    <div class="col-md-6">

        <ul class="list-group">
            <li class="list-group-item"><h3>Username: {{ $user->username }}</h3></li>
            <li class="list-group-item"><h3>Name: {{ $user->first_name }} {{ $user->last_name }}</h3></li>
            <li class="list-group-item"><h3>Email: {{ $user->email }}</h3></li>
        </ul>

        <a href="{{ URL::to('users') }}/{{ $user->username}}" class="btn btn-primary"><i class="fa fa-user"></i> View Public Profile</a>
        <a href="{{ URL::to('profile/edit') }}" class="btn btn-default pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
</div>
@stop
