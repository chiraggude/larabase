@if(count($banned_users))

        <h3>Revoke User Account Ban</h3>

        {{ Form::open(['action' => 'Admin\UsersController@revokeBanUser']) }}

        {{ Form::selectField('banned_user_id', $banned_users, null, 'Select User to revoke Account Ban') }}

        {{ Form::submitField('Revoke User Account Ban') }}

        {{ Form::close() }}

@else

    <h3 class="text-muted">0 users have been banned</h3>

@endif