@extends('layouts.master')
@section('content')
<h1>Posts by {{ $username }}</h1>
<hr>

    @if(count($posts) > 0)

        @foreach($posts as $post)

            <h2> {{ link_to("/posts/{$post->id}", $post->title) }}</h2>

            <p class="text-muted">{{ mb_strtoupper($post->updated_at->diffForHumans()) }}</p>

            {{ str_limit($post->content, 480, "...") }}

            {{ HTML::br('2') }}

            <a class="btn btn-xs btn-success" href="{{ URL::to('posts/' . $post->id) }}">Read More</a>
            <a class="btn btn-xs btn-info" href="{{ URL::to('posts/' . $post->id . '/edit') }}">Edit</a>

            <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete">Delete</button>
            {{ HTML::deleteModal('delete','posts','Post', $post->id) }}

            <hr>

        @endforeach

    @else
        <p class="text-muted">{{ $username }} has not published any posts yet</p>
    @endif

{{ $posts->links() }}

@stop