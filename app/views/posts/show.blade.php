@extends('layouts.master')
@section('content')

    <h2>{{ $post->title }}</h2>

    <p class="text-muted">LAST UPDATED {{ mb_strtoupper($post->updated_at->diffForHumans()) }}</p>

    <hr>

    <p>{{ $post->content }}</p>

    <p class="text-muted">WRITTEN BY {{ link_to("/users/{$post->user->username}", mb_strtoupper($post->user->username)) }}</p>

    <p class="text-muted">CREATED ON {{ mb_strtoupper($post->created_at->setTimezone($user_timezone)->toDayDateTimeString()) }}</p>

    <p class="text-muted">
    @foreach($post->tags as $tag)
        <a href="{{ url("/posts/tag/{$tag->name}") }}" class="btn btn-default btn-xs">#{{ $tag->name }}</a>
    @endforeach
    </p>

    <hr>

    @if (Auth::check() && is_owner_or_admin(Auth::user(), $post))
        <a class="btn btn-xs btn-info" href="{{ $post->edit_url }}"><i class="fa fa-edit"></i> Edit</a>
        <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> Delete</button>
        {{ HTML::deleteModal('delete','posts','Post', $post->id) }}
    @endif

    {{ HTML::br('2') }}

@stop