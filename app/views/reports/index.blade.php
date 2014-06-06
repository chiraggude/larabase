@extends('layouts.master')
@section('content')
<a class="btn btn-success pull-right" href="{{ URL::to('reports/create') }}"><i class="fa fa-plus-circle"></i> Create Report</a>
<h1>Reports</h1>

    @if(count($reports) > 0)

    @foreach($reports as $report)

        <h2> {{ link_to("/reports/{$report->id}", $report->title) }} <small>{{ $report->updated_at->diffForHumans() }}</small></h2>

        {{ str_limit($report->content, 480, "...") }}  </br>

        <a class="btn btn-xs btn-success" href="{{ URL::to('reports/' . $report->id) }}">Read More</a>
        <a class="btn btn-xs btn-info" href="{{ URL::to('reports/' . $report->id . '/edit') }}">Edit</a>

        <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete">Delete</button>
        {{ HTML::deleteModal('delete','reports','Report', $report->id) }}

        <hr>

    @endforeach

    @else
        <p class="text-muted">Get started by creating a report</p>
    @endif

    {{ $reports->links() }}

@stop