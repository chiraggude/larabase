@extends('layouts.master')
@section('content')

<h1><i class="fa fa-users"></i> Users</h1>

<hr>

@foreach (array_chunk($users->getItems(), 4) as $usersRow)
<div class="row">
    @foreach ($usersRow as $user)
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <a href="{{ URL::to('users/'.$user->username) }}" class="pull-left">
                            <img src="{{ gravatar_url($user->email, 60) }}" alt="{{ $user->full_name }}" class="img-thumbnail">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->full_name }} <small>{{ link_to("/users/{$user->username}", $user->username) }}</small></h4>
                            <p class="text-muted">last seen {{$user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endforeach

{{ $users->links() }}

@stop