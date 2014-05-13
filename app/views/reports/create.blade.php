@extends('layouts.master')
@section('content')

        {{ Form::open(array('route' => 'reports.store', 'method' =>'post', 'role'=>'form')) }}

        {{ Form::textField('title', 'Title', 'The Story of India') }}

        <div class="form-group {{ $errors->has('content') ? 'has-error' : null }}">
            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control', 'placeholder'=>'Start writing...')) }}
            {{ $errors->first('content', '<p class="help-block">:message</p>') }}
        </div>

        {{ Form::textField('category', 'Category', null) }}

        {{ Form::textField('tag', 'Tag', null) }}

        {{ Form::textField('status', 'Status', null) }}

        {{ Form::textField('visibility', 'Visibility', null) }}

        <a href='{{URL::previous()}}' class='btn btn-default pull-right'>Cancel</a>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

        {{ Form::close() }}

@stop