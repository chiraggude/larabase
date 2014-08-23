@extends('layouts.master')
@section('content')

<h1><i class="fa fa-cog"></i> Settings </h1>
<hr>
<div class="row">
    <div class="col-md-12">

        <h3><i class="fa fa-lock"></i> Security & Privacy</h3>
        {{ HTML::table($security_settings, ['Setting 1', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}

        <h3><i class="fa fa-exchange"></i> Personalisation</h3>
        {{ HTML::table($personal_settings, ['Timezone', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}

        {{ HTML::br(2) }}

        <a href="{{ URL::to('/settings/edit') }}" class="btn btn-default"><i class="fa fa-edit"></i> Edit Settings</a>
        <a href="{{ URL::to('password/change') }}" class="btn btn-default pull-right"><i class="fa fa-lock"></i> Change Password</a>

        {{ HTML::br(3) }}

        <p class="text-muted">Account created on {{ $user->created_at->setTimezone($user_timezone)->toDayDateTimeString() }} ({{ $user->created_at->diffForHumans() }}) </p>

        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#delete-account"><i class="fa fa-power-off"></i> Delete Account</button>
        {{ HTML::deleteAccountModal('delete-account') }}

    </div>
</div>
@stop
