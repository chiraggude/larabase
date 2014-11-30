@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-body">

    <h2>{{ $post->title }}</h2>

    <p class="text-muted">
        Written {{ $post->updated_at->diffForHumans() }}
        by <a href="{{ url("/users/{$post->user->username}") }}">{{ $post->user->full_name }}</a>
        under
        @foreach($post->categories as $category)
           <a href="{{ url("/posts/category/{$category->name}") }}">{{ mb_strtoupper($category->name) }}</a>
        @endforeach
    </p>

    <p>{{ $post->content }}</p>

    <p class="text-muted">Read more posts by <a href="{{ url("/posts/user/{$post->user->username}") }}">{{ $post->user->full_name }}</a></p>

    <p class="text-muted">
        @foreach($post->tags as $tag)
            <a href="{{ url("/posts/tag/{$tag->name}") }}">#{{ $tag->name }}</a>
        @endforeach
    </p>

    @if (Auth::check() && is_owner_or_admin(Auth::user(), $post))
        <a class="btn btn-xs btn-info" href="{{ $post->edit_url }}"><i class="fa fa-edit"></i> Edit</a>
        <button class="btn btn-xs btn-danger pull-right" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> Delete</button>
        {{ HTML::deleteModal('delete','posts','Post', $post->id) }}
    @endif

  </div>
</div>

@stop