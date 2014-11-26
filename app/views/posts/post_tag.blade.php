@extends('layouts.master')
@section('content')
<h1>#{{ $tag_name }}</h1>
<hr>

    @forelse($posts as $post)
        @include('posts/partials/post')
    @empty
        <p class="text-muted">No posts are tagged with #{{ $tag }}</p>
    @endforelse

{{ $posts->links() }}

@stop