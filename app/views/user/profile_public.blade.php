@extends('layouts.master')
@section('content')

@if ( ! $user->first_name == null )
    <h1>{{ $user->first_name }} {{ $user->last_name }} <small>Some random status message by the user...</small></h1>
@else
    <h1>{{ $user->username }} <small>Some random status message by the user...</small></h1>
@endif

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="media">
            <img src="{{ gravatar_url($user->email, 140) }}" alt="{{ $user->username }}" class="media-object pull-left">
            <div class="media-body">
                <h3 class="media-heading">{{ $user->username }}</h3>
                <h4>City, Country</h4>
                <p><strong>About me: </strong>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            </div>
        </div>
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
