@extends('layouts.master')
@section('content')

    {{ Form::open(array('route' => 'posts.store', 'method' =>'post')) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', null) }}

    <div class="row">
        <div class="col-md-6">
            {{ Form::textField('category', 'Category', null) }}
            {{ Form::selectField('status', ['published' =>'Published','draft' =>'Draft'], 'published', 'Status') }}
        </div>
        <div class="col-md-6">
            {{ Form::textField('tag', 'Tag', null) }}
            {{ Form::selectField('visibility', ['public' =>'Public','private' =>'Private'], 'public', 'Visibility') }}
        </div>
    </div>

    {{ Form::hidden('user_id', $user_id) }}

    {{ cancel_button() }}

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop
