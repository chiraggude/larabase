@extends('layouts.master')
@section('content')
<a class="btn btn-success pull-right" href="{{ URL::to('reports/create') }}"><i class="fa fa-plus-circle"></i> Create Report</a>
<h1>Reports</h1>

    @foreach($reports as $report)
         <h2> {{ link_to("/reports/{$report->id}", $report->title) }} <small>{{ $report->updated_at->diffForHumans() }}</small></h2>
         {{ str_limit($report->content, 480, "...") }}  </br>
         <a class="btn btn-xs btn-success" href="{{ URL::to('reports/' . $report->id) }}">Read More</a>
         <a class="btn btn-xs btn-info" href="{{ URL::to('reports/' . $report->id . '/edit') }}">Edit</a>

         {{ Form::open(array('route' => ['reports.destroy', $report->id], 'method' => 'DELETE', 'class' => 'pull-right')) }}
         {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-warning')) }}
         {{ Form::close() }}
         <hr>
    @endforeach

{{ $reports->links() }}

@stop