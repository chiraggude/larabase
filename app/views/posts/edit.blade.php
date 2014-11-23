@extends('layouts.master')
@section('content')

    {{ Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT']) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', null) }}

    {{ Form::textField('category', 'Category', null) }}

    {{ Form::selectTag('tags', 'post-tags', 'Tags') }}

    {{ Form::selectField('status', ['published' =>'Published','draft' =>'Draft'], 'published', 'Status') }}

    {{ Form::selectField('visibility', ['public' =>'Public','private' =>'Private'], 'public', 'Visibility') }}

    {{ cancel_button() }}

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop

@section('footer-js')
{{ HTML::script('js/magicsuggest.min.js') }}
<script>
    var url = 'http://localhost/larabase/public/api/tags'
    var placeholder_tag = {{ json_encode($selected_tags) }}
    var tags = {{ json_encode($tags) }}
</script>
@stop