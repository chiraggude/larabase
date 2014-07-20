@extends('layouts.master')
@section('content')

<h1><i class="fa fa-cog"></i> Settings</h1>
<hr>
<div class="row">
    <div class="col-md-12">

        <h3><i class="fa fa-lock"></i> Security & Privacy</h3>
        {{ HTML::table($security_settings, ['Setting 1', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}

        {{ HTML::br(1) }}

        <h3><i class="fa fa-exchange"></i> Personalisation</h3>
        {{ HTML::table($personal_settings, ['Timezone', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}

        {{ HTML::br(1) }}

        <a href="{{ URL::to('/settings/edit') }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit Setting</a>
        <a href="{{ URL::to('password/change') }}" class="btn btn-sm btn-default"><i class="fa fa-lock"></i> Change Account Password</a>

        {{ HTML::br(3) }}

        <h4 class="text-muted">Account Created: {{ $user->created_at->setTimezone($user_timezone)->toDayDateTimeString() }} ({{ $user->created_at->diffForHumans() }})</h4>

        @if ($user->activated=true)
        <h4 class="text-muted"><span class="label label-success">Account Status: Active</span>
            <a class="btn btn-xs btn-default" href="{{ URL::to('#') }}"><i class="fa fa-power-off"></i> Deactivate Account</a>
        </h4>
        @else
        <h4 class="text-muted"><span class="label label-danger">Account Status: Inactive</span>
            <a class="btn btn-xs btn-success" href="{{ URL::to('#') }}">Reactivate Account</a>
        </h4>
        @endif


    </div>
</div>
@stop
