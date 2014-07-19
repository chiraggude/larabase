@extends('layouts.master')
@section('content')

    {{ Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT']) }}

    {{ Form::textField('title', 'Title', '') }}

    {{ Form::textareaField('content', 'Content', '') }}

    {{ Form::textField('category', 'Category', '') }}

    {{ Form::textField('tag', 'Tag', '') }}

    {{ Form::textField('status', 'Status', '') }}

    {{ Form::textField('visibility', 'Visibility', '') }}

    <a href='{{ URL::previous() }}' class='btn btn-default pull-right'>Cancel</a>

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop