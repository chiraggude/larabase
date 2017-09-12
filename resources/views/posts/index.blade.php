@extends('layouts.master')
@section('content')
<a class="btn btn-sm btn-success pull-right" href="{!! URL::to('posts/create') !!}"><i class="fa fa-plus-circle"></i> Create Post</a>
<h1>Blog</h1>
<hr>

    @forelse($posts as $post)
        @include('posts/partials/post')
    @empty
        <p class="text-muted">Get started by creating a new Post</p>
    @endforelse

{!! $posts->links() !!}

@stop