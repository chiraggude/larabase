@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Permissions</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td class="col-md-2">
                        <a class="btn btn-xs btn-default" href="{{ route('admin.permissions.edit', $permission->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{ $permission->name }}"><i class="fa fa-trash-o"></i> Delete</button>
                        {{ HTML::deleteModal($permission->name,'admin.categories','permission', $permission->id) }}
                    </td>
                </tr>
                @empty
                    <p class="text-muted">Get started by creating a new Permission</p>
                @endforelse
            </tbody>
        </table>
  </div>
</div>



<hr>

<h3>Add new Permission</h3>

<div class="col-md-6">
    {{ Form::open(['route' => 'admin.permissions.store', 'method' =>'post', 'class' => 'form-horizontal']) }}

    {{ Form::textField('name', 'Permission Name', 'Permission Name') }}

    {{ Form::textField('description', 'Description', 'Description') }}

    {{ Form::submitField('Save New Permission') }}

    {{ Form::close() }}
</div>

@stop