@extends('layouts.master')
@section('content')

    {{ Form::open(array('route' => 'posts.store', 'method' =>'post')) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', null) }}

    {{ Form::selectField('category', $categories, $default_category_id, 'Category') }}

    {{ Form::selectTag('tags', 'post-tags', 'Tags') }}

    {{ Form::selectField('status', ['published' =>'Published','draft' =>'Draft'], 'published', 'Status') }}

    {{ Form::hidden('user_id', $user_id) }}

    {{ cancel_button() }}

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop

@section('footer-js')
{{ HTML::script('js/magicsuggest.min.js') }}
<script>
    var url = 'http://localhost/larabase/public/api/tags'
    var placeholder_tag = {{ json_encode($default_tag_id) }}
    var tags = {{ json_encode($tags) }}
</script>
@stop
