<h3>Ban User Accounts</h3>

{{ Form::open(['action' => 'Admin\UsersController@banUser']) }}

{{ Form::selectField('ban_user_id', $users_list, null, 'Select User for Account Ban') }}

{{ Form::submitField('Ban User Account') }}

{{ Form::close() }}