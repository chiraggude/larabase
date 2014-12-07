@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Categories</h3>
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
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="col-md-2">
                        <a class="btn btn-xs btn-default" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{ $category->name }}"><i class="fa fa-trash-o"></i> Delete</button>
                        {{ HTML::deleteModal($category->name,'admin.categories','Category', $category->id) }}
                    </td>
                </tr>
                @empty
                    <p class="text-muted">Get started by creating a new Category</p>
                @endforelse
            </tbody>
        </table>
  </div>
</div>



<hr>

<h3>Add New Category</h3>

<div class="col-md-6">
    {{ Form::open(['route' => 'admin.categories.store', 'method' =>'post', 'class' => 'form-horizontal']) }}

    {{ Form::textField('name', 'Category Name', 'Category Name') }}

    {{ Form::textField('description', 'Description', 'Description') }}

    {{ Form::submitField('Save New Category') }}

    {{ Form::close() }}
</div>

@stop