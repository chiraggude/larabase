@extends('layouts.master')
@section('content')
<h2>{{ $report->title }} </h2>
<hr>
{{ $report->content }}
<hr>
<a class="btn btn-xs btn-info" href="{{ URL::to('reports/' . $report->id . '/edit') }}">Edit</a>
{{ Form::open(array('route' => ['reports.destroy', $report->id], 'method' => 'DELETE', 'class' => 'pull-right')) }}
{{ Form::submit('Delete', array('class' => 'btn btn-xs btn-warning')) }}
{{ Form::close() }}
@stop
