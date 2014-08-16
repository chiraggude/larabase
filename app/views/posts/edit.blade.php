@extends('layouts.master')
@section('content')

    {{ Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT']) }}

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

    {{ cancel_button() }}

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop