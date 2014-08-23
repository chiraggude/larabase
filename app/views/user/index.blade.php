@extends('layouts.master')
@section('content')

<h1>Users</h1>

<hr>

@foreach($users as $user)

<div class="media">
    <a class="pull-left" href="{{ URL::to('users/'.$user->username) }}">
        <img class="media-object" src="{{ gravatar_url($user->email, 60) }}" alt="{{ $user->username }}">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{ $user->full_name }} {{ link_to("/users/{$user->username}", $user->username) }} </h4>
        <p class="text-muted">last seen {{$user->updated_at->diffForHumans() }}</p>
    </div>
</div>

@endforeach

{{ $users->links() }}

@stop