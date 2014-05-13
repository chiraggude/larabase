@extends('layouts.master')
@section('content')

        {{ Form::open(array('route' => ['reports.update', $report->id], 'method' =>'put', 'role'=>'form')) }}
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', @$report->title, array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', @$report->content, array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('category', 'Category') }}
            {{ Form::text('category', @$report->category, array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('tag', 'Tag') }}
            {{ Form::text('tag', @$report->tag, array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('status', 'Status') }}
            {{ Form::text('status', @$report->status, array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('visibility', 'Visibility') }}
            {{ Form::text('visibility', @$report->visibility, array('class'=>'form-control')) }}
        </div>
        <a href='{{URL::previous()}}' class='btn btn-default pull-right'>Cancel</a>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}

@stop