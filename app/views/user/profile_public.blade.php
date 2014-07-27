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
        <img src="{{ gravatar_url($user->email, 140) }}" alt="{{ gravatar_url($user->email, 140) }}">
        <h3>Location</h3>
        <h3>Bio</h3>
    </div>

    <div class="col-md-6">
        <h3>Recent Activity <small>{{ $user->updated_at->diffForHumans() }}</small></h3>
        <h3>Favourites</h3>
        <h3>Connections</h3>
    </div>
</div>

<div class="row">
<div class="col-md-6">
    @if(count($user->posts) > 0)
        <h3>Posts <span class="badge">{{ count($user->posts) }} </span><small><a href="{{ URL::to('users/'.$user->username.'/posts') }}"> (see all)</a></small></h3>
        <div class="list-group">
        @foreach($user->posts as $user->post)
            <a href="{{ URL::to('posts/' . $user->  post->id) }}" class="list-group-item">{{ $user->post->title }}</a>
        @endforeach
        </div>
    @else
        <p class="text-muted">{{ $user->username }} hasn't written any articles</p>
    @endif
</div>
</div>


@stop
