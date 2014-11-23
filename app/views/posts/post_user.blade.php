@extends('layouts.master')
@section('content')
<h1>Posts by {{ $username }}</h1>
<hr>

    @forelse($posts as $post)
        @include('posts/partials/post')
    @empty
        <p class="text-muted">{{ $username }} has not published any posts yet</p>
    @endforelse

{{ $posts->links() }}

@stop