@extends('layouts.master')
@section('content')

        <h2>{{ $report->title }} <small>{{ $report->updated_at->diffForHumans() }}</small></h2>

        <hr>

        <p>{{ $report->content }}</p>

        <p class="text-muted">PUBLISHED BY {{ link_to("/users/{$user->username}", mb_strtoupper($user->username)) }}</p>

        <hr>

        <a class="btn btn-xs btn-info" href="{{ URL::to('reports/' . $report->id . '/edit') }}">Edit</a>

        <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#delete">Delete</button>
        {{ HTML::deleteModal('delete','reports','Report', $report->id) }}

@stop