@extends('layouts.master')
@section('content')

<h1><i class="fa fa-cog"></i> Settings </h1>
<hr>
<div class="row">
    <div class="col-md-12">

      <div role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#security" aria-controls="security" role="tab" data-toggle="tab"><i class="fa fa-lock"></i> Security</a>
            </li>
            <li role="presentation">
                <a href="#general" aria-controls="general" role="tab" data-toggle="tab"><i class="fa fa-exchange"></i> General</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="security">
                    {{ HTML::table($security_settings, ['Setting 1', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}
              </div>
              <div role="tabpanel" class="tab-pane" id="general">
                     {{ HTML::table($personal_settings, ['Timezone', 'Setting 2', 'Setting 3', 'Setting 4', 'Setting 5']) }}
              </div>
          </div>
        </div>

        {{ HTML::br(1) }}

        <a href="{{ URL::to('/settings/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit Settings</a>

        <a href="{{ URL::to('password/change') }}" class="btn btn-default btn-sm pull-right"><i class="fa fa-lock"></i> Change Password</a>

        {{ HTML::br(3) }}

        <p class="text-muted">Account created {{ $user->created_at->diffForHumans() }} ({{ $user->created_at->setTimezone($user_timezone)->toDayDateTimeString() }}) </p>

        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#delete-account"><i class="fa fa-power-off"></i> Delete Account</button>
        {{ HTML::deleteAccountModal('delete-account') }}

    </div>
</div>
@stop
