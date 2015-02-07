@extends('layouts.master')
@section('content')

<div class="col-md-6">

    {{ Form::model($role, ['route'=> ['admin.roles.update', $role->id], 'method' => 'PUT']) }}

    {{ Form::textField('name', 'Role', null) }}

    {{ Form::multiSelectField('permissions[]', Permission::lists('name', 'id'), $role->permissions->lists('id'), 'Permissions') }}

    {{ cancel_button() }}

    {{ Form::submitField('Save Changes') }}

    {{ Form::close() }}

</div>

@stop