@extends('layouts.master')
@section('content')

    {{ Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT']) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', null) }}

    {{ Form::textField('category', 'Category', null) }}

    {{ Form::textField('tag', 'Tag', null) }}

    {{ Form::selectField('status', ['published' =>'Published','draft' =>'Draft'], 'published', 'Status') }}

    {{ Form::selectField('visibility', ['public' =>'Public','private' =>'Private'], 'public', 'Visibility') }}

    <a href='{{ URL::previous() }}' class='btn btn-default pull-right'>Cancel</a>

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop