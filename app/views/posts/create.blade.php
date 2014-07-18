@extends('layouts.master')
@section('content')

    {{ Form::open(array('route' => 'posts.store', 'method' =>'post')) }}

    {{ Form::textField('title', 'Title', null) }}

    {{ Form::textareaField('content', 'Content', 'Start writing...') }}

    {{ Form::textField('category', 'Category', null) }}

    {{ Form::textField('tag', 'Tag', null) }}

    {{ Form::textField('status', 'Status', null) }}

    {{ Form::textField('visibility', 'Visibility', null) }}

    {{ Form::hidden('user_id', $user_id) }}

    <a href='{{ URL::previous() }}' class='btn btn-default pull-right'>Cancel</a>

    {{ Form::submitField('Submit') }}

    {{ Form::close() }}

@stop
