@extends('layouts.master')
@section('content')
<h4 class="text-muted pull-right">Account Status <span class="label label-success">Active</span></h4>
<h1><i class="fa fa-cog"></i> Settings</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <h3>Security</h3>
        <h3>Notifications</h3>
        <h3>Privacy</h3>
        <h3>Payments</h3>
        {{ HTML::br(1) }}
        <a href="{{ URL::to('password/change') }}" class="btn btn-default"><i class="fa fa-pencil"></i> Change Account Password</a>
    </div>

    <div class="col-md-6">
        <h4 class="text-muted">Account Created: {{ $user->created_at->toDayDateTimeString() }} ({{ $user->created_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Last Updated: {{ $user->updated_at->toDayDateTimeString() }} ({{ $user->updated_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Current Time: {{ Carbon\Carbon::now()->toTimeString() }}</h4>
        @if ($user->activated=true)
        <a class="btn btn-sm btn-danger" href="{{ URL::to('#') }}">Deactivate Account</a>
        @else
        <a class="btn btn-sm btn-success" href="{{ URL::to('#') }}">Reactivate Account</a>
        @endif
    </div>
</div>
@stop
