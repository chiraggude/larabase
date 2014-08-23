@extends('layouts.master')
@section('content')

<h1>Edit Settings</h1>
<hr>

    <div class="col-md-6">

        {{ Form::model($user, ['action'=> ['AccountController@settingsSave'],'class' => 'form-horizontal']) }}

        {{ Form::selectField('timezone', $timezones, $user_timezone, 'Time Zone') }}

        <h4 class="text-muted">Your Time: {{ Carbon\Carbon::now($user_timezone)->toTimeString() }} ({{ $user_timezone }})</h4>

        <h4 class="text-muted">LaraBase Time: {{ Carbon\Carbon::now()->toTimeString() }} (UTC)</h4>

        {{ HTML::br('2') }}

        {{ cancel_button() }}

        {{ Form::submitField('Save Changes') }}

        {{ Form::close() }}

    </div>

@stop
