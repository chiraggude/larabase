@extends('layouts.master')
@section('content')

<h1>{{ $user->first_name }} {{ $user->last_name }}</h1>

<div class="row">
    <div class="col-md-6">
        <h3>Username: {{ $user->username }}</h3>
    </div>

    <div class="col-md-6">
        <h3>Recent Activity</h3>
        <h3>Favourites</h3>
        <h3>Connections</h3>
        <h3>About</h3>
    </div>

</div>
@stop
