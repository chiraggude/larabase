@extends('layouts.master')
@section('content')

<h1><i class="fa fa-users"></i> Users</h1>

<hr>

@foreach (array_chunk($users->getItems(), 4) as $usersRow)
    <div class="row">
        @foreach ($usersRow as $user)
            <div class="col-md-3">
                    <div class="media">
                        <a class="pull-left" href="{{ URL::to('users/'.$user->username) }}">
                            <img class="media-object" src="{{ gravatar_url($user->email, 60) }}" alt="{{ $user->username }}">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->full_name }} <small>{{ link_to("/users/{$user->username}", $user->username) }}</small></h4>
                            <p class="text-muted">last seen {{$user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
@endforeach

{{ $users->links() }}

@stop