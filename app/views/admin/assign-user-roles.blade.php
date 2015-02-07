<h3>Assign User Roles</h3>

{{ Form::open(['action' => 'Admin\UsersController@assignUserRoles']) }}

{{ Form::selectField('user_id', $users_list, null, 'Select User') }}

{{ Form::multiSelectField('roles[]', Role::lists('name', 'id'), ['2'], 'Roles') }}

{{ Form::submitField('Assign User Roles') }}

{{ Form::close() }}