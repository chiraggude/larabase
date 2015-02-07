@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Roles</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @forelse($role->permissions as $permission)
                            <span class="label label-default">{{ $permission->name }}</span>
                        @empty
                            <p class="text-muted">Role has no associated Permissions</p>
                        @endforelse
                    </td>
                    <td class="col-md-2">
                        <a class="btn btn-xs btn-default" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{ $role->name }}"><i class="fa fa-trash-o"></i> Delete</button>
                        {{ HTML::deleteModal($role->name,'admin.roles','role', $role->id) }}
                    </td>
                </tr>
                @empty
                    <p class="text-muted">Get started by creating a new Role</p>
                @endforelse
            </tbody>
        </table>
  </div>
</div>

<hr>

<h3>Add new Role</h3>

<div class="col-md-6">
    {{ Form::open(['route' => 'admin.roles.store', 'method' =>'post', 'class' => 'form-horizontal']) }}

    {{ Form::textField('name', 'Role Name', 'Role Name') }}

    {{ Form::multiSelectField('permissions[]', Permission::lists('name', 'id'), ['2'], 'Permissions') }}

    {{ Form::submitField('Save new Role') }}

    {{ Form::close() }}
</div>

@stop