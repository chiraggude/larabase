@extends('layouts.master')
@section('content')
<h4 class="text-muted pull-right">Account Status <span class="label label-success">Active</span></h4>
<h1><i class="fa fa-cog"></i> Settings</h1>
<hr>
<div class="row">
    <div class="col-md-12">

        <h3><i class="fa fa-lock"></i> Security & Privacy</h3>
        {{ HTML::table($settings, ['Setting 1', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}
        <a href="{{ URL::to('#') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i> Edit Security Settings</a>
        <a href="{{ URL::to('password/change') }}" class="btn btn-sm btn-default"><i class="fa fa-lock"></i> Change Account Password</a>

        {{ HTML::br(3) }}

        <h3><i class="fa fa-exchange"></i> Notifications</h3>
        {{ HTML::table($settings, ['Setting 1', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}
        <a href="{{ URL::to('#') }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i> Edit Notifications Settings</a>

        {{ HTML::br(3) }}

        <h4 class="text-muted">Account Created: {{ $user->created_at->toDayDateTimeString() }} ({{ $user->created_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Last Updated: {{ $user->updated_at->toDayDateTimeString() }} ({{ $user->updated_at->diffForHumans() }})</h4>
        <h4 class="text-muted">Current Time: {{ Carbon\Carbon::now()->toTimeString() }}</h4>
        @if ($user->activated=true)
        <a class="btn btn-sm btn-default" href="{{ URL::to('#') }}"><i class="fa fa-power-off"></i> Deactivate Account</a>
        @else
        <a class="btn btn-sm btn-success" href="{{ URL::to('#') }}">Reactivate Account</a>
        @endif

    </div>
</div>
@stop
