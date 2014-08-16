@extends('layouts.master')
@section('content')

    {{ Form::open(array('route' => 'posts.store', 'method' =>'post')) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', null) }}

    {{ Form::textField('category', 'Category', null) }}

    {{ Form::selectField('status', ['published' =>'Published','draft' =>'Draft'], 'published', 'Status') }}

    {{ Form::textField('tag', 'Tag', null) }}

    {{ Form::selectField('visibility', ['public' =>'Public','private' =>'Private'], 'public', 'Visibility') }}

    {{ Form::hidden('user_id', $user_id) }}

    {{ cancel_button() }}

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop
