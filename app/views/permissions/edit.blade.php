@extends('layouts.master')
@section('content')

<div class="col-md-6">

    {{ Form::model($permission, ['route'=> ['admin.permissions.update', $permission->id], 'method' => 'PUT']) }}

    {{ Form::textField('name', 'Permission Name', null) }}

    {{ Form::textField('description', 'Description', null) }}

    {{ cancel_button() }}

    {{ Form::submitField('Save Changes') }}

    {{ Form::close() }}

</div>

@stop