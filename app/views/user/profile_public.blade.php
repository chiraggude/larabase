@extends('layouts.master')
@section('content')

@if ( ! $user->first_name == null )
    <h1>{{ $user->first_name }} {{ $user->last_name }} <small>{{ $user->username }}</small></h1>
@else
    <h1>{{ $user->username }}</h1>
@endif
<hr>
<h3 class="text-muted">Some random status message by the user...</h3>
<div class="row">
    <div class="col-md-6">
        <h3>Photo</h3>
        <h3>Location</h3>
        <h3>Bio</h3>
    </div>

    <div class="col-md-6">
        <h3>Recent Activity <small>{{ $user->updated_at->diffForHumans() }}</small></h3>
        <h3>Favourites</h3>
        <h3>Connections</h3>
    </div>

</div>
@stop
