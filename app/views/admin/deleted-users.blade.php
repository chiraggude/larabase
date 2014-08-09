@extends('layouts.master')
@section('content')

<h1>Restore User</h1>

<div class="col-md-6">

@if($users == null)

    <h3 class="text-muted">0 Deleted Users</h3>

@else

    {{ Form::open(['action' => 'AdminController@restoreUser', 'class' => 'form-horizontal']) }}

    {{ Form::selectField('user_id', $users, null, 'Select User for Account Restoration') }}

    <a href='{{ URL::previous() }}' class='btn btn-default pull-right'>Cancel</a>

    {{ Form::submitField('Restore User Account') }}

    {{ Form::close() }}

@endif

</div>

@stop