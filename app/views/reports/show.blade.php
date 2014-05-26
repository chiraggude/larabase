@extends('layouts.master')
@section('content')

        <h2>{{ $report->title }} <small>{{ $report->updated_at->diffForHumans() }}</small></h2>
        <hr>
        <p>{{ $report->content }}</p>
        <p class="text-muted">PUBLISHED BY {{ link_to("/users/{$user->username}", mb_strtoupper($user->username)) }}</p>
        <hr>

        <a class="btn btn-xs btn-info" href="{{ URL::to('reports/' . $report->id . '/edit') }}">Edit</a>

        {{ Form::open(array('route' => ['reports.destroy', $report->id], 'method' => 'DELETE', 'class' => 'pull-right')) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-warning')) }}
        {{ Form::close() }}

@stop