@extends('...layouts.master')
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
                            <img src="{{ image_url($user->profile->avatar_filename) }}" alt="{{ $user->full_name }}" width="60" height="60">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->full_name }} </h4>
                            <small class="text-muted">{{ link_to("/users/{$user->username}", $user->username) }}</small>
                            <p class="small text-muted">last seen {{$user->updated_at->diffForHumans() }}</p>
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