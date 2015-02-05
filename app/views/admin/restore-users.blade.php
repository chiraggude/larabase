@if(count($deleted_users))

    <h3>Restore User Accounts</h3>

    {{ Form::open(['action' => 'Admin\UsersController@restoreUser']) }}

    {{ Form::selectField('user_id', $deleted_users, null, 'Select User for Account Restoration') }}

    {{ Form::submitField('Restore User Account') }}

    {{ Form::close() }}

@else

    <h3 class="text-muted">0 users have deleted their account</h3>

@endif