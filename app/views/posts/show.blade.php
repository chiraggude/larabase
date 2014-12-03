@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-body">

    @foreach($post->categories as $category)
       <a href="{{ url("/posts/category/{$category->name}") }}">{{ mb_strtoupper($category->name) }}</a>
    @endforeach

    <h2>{{ $post->title }}</h2>

    <p class="text-muted">
        {{ mb_strtoupper($post->updated_at->diffForHumans()) }} |
        <a href="{{ url("/users/{$post->user->username}") }}">{{ mb_strtoupper($post->user->full_name) }}</a>
    </p>

    <p>{{ $post->content }}</p>

    <ul class="list-inline">
        @foreach($post->tags as $tag)
            <li><a href="{{ url("/posts/tag/{$tag->name}") }}">#{{ $tag->name }}</a></li>
        @endforeach
    </ul>

    @if (Auth::check() && is_owner_or_admin(Auth::user(), $post))
        <a class="btn btn-xs btn-info" href="{{ $post->edit_url }}"><i class="fa fa-edit"></i> Edit</a>
        <button class="btn btn-xs btn-danger pull-right" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> Delete</button>
        {{ HTML::deleteModal('delete','posts','Post', $post->id) }}
    @endif

  </div>
</div>

@stop