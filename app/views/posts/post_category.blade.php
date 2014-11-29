@extends('layouts.master')
@section('content')

<h1>{{ $category_name }}</h1>

<hr>

    @forelse($posts as $post)
        @include('posts/partials/post')
    @empty
        <p class="text-muted">No posts are posted under {{ $category }}</p>
    @endforelse

{{ $posts->links() }}

@stop