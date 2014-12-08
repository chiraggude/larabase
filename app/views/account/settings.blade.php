@extends('layouts.master')
@section('content')
<h1>Settings</h1>
<hr>

<div class="row">
    <div class="col-md-6">
          <div role="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                      <a href="#general" aria-controls="general" role="tab" data-toggle="tab"><i class="fa fa-cogs"></i> General</a>
                  </li>
                  <li role="presentation">
                       <a href="#email" aria-controls="email" role="tab" data-toggle="tab"><i class="fa fa-envelope"></i> Email Preferences</a>
                  </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="general">
                        <div class="well well-lg">
                            <p><strong>Time zone</strong>: {{ $user->timezone }}</p>
                        </div>
                        <a href="{{ URL::to('/settings/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit Settings</a>
                        <a href="{{ URL::to('password/change') }}" class="btn btn-default btn-sm pull-right"><i class="fa fa-lock"></i> Change Password</a>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="email">
                        {{ HTML::table($example_settings, $example_values) }}
                  </div>
              </div>

          </div>
          <hr>
          <!-- Deactivate Account panel -->
          <div class="panel panel-default">
                <div class="panel-body text-center">
                      <p class="text-muted">Account created {{ $user->created_at->diffForHumans() }} on {{ $user->created_at->setTimezone($user_timezone)->toDayDateTimeString() }}</p>
                      <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#delete-account"><i class="fa fa-power-off"></i> Delete Account</button>
                </div>
          </div>
          {{ HTML::deleteAccountModal('delete-account') }}
    </div>
</div>
@stop
