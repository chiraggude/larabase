@extends('layouts.master')
@section('content')

<h1>General Account Settings</h1>

<div class="row">
    <div class="col-md-6">
        <h3>Security</h3>
        <h3>Notifications</h3>
        <h3>Privacy</h3>
        <h3>Payments</h3>
    </div>

    <div class="col-md-6">
        <h4>Account Status <span class="label label-success">Active</span></h4>
        @if ($user->activated=true)
        <a class="btn btn-danger" href="{{ URL::to('#') }}">Deactivate Account</a>
        @else
        <a class="btn btn-default" href="{{ URL::to('#') }}">Reactivate Account</a>
        @endif

        <h4 class="text-muted">Account Created: {{ $user->created_at->toDayDateTimeString() }} ({{ $user->created_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Last Updated: {{ $user->updated_at->toDayDateTimeString() }} ({{ $user->updated_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Current Time: {{ Carbon\Carbon::now()->toTimeString() }}</h4>
    </div>
</div>
@stop
