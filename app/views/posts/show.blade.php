@extends('layouts.master')
@section('content')

    <h2>{{ $post->title }}</h2>

    <p class="text-muted">LAST UPDATED {{ mb_strtoupper($post->updated_at->diffForHumans()) }}</p>

    <hr>

    <p>{{ $post->content }}</p>

    <p class="text-muted">PUBLISHED BY {{ link_to("/users/{$user->username}", mb_strtoupper($user->username)) }}</p>

    <p class="text-muted">CREATED ON {{ mb_strtoupper($post->created_at->setTimezone($user_timezone)->toDayDateTimeString()) }}</p>

    <hr>

    <a class="btn btn-xs btn-info" href="{{ URL::to('posts/' . $post->id . '/edit') }}">Edit</a>

    <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete">Delete</button>
    {{ HTML::deleteModal('delete','posts','Post', $post->id) }}

    {{ HTML::br('2') }}

@stop