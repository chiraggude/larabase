@extends('layouts.master')
@section('content')

    <h2>{{ $post->title }} <small>{{ $post->updated_at->diffForHumans() }}</small></h2>

    <hr>

    <p>{{ $post->content }}</p>

    <p class="text-muted">PUBLISHED BY {{ link_to("/users/{$user->username}", mb_strtoupper($user->username)) }}</p>

    <hr>

    <a class="btn btn-xs btn-info" href="{{ URL::to('posts/' . $post->id . '/edit') }}">Edit</a>

    <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete">Delete</button>
    {{ HTML::deleteModal('delete','posts','Post', $post->id) }}

@stop