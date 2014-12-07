@extends('layouts.master')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tags</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td class="col-md-2">
                        <a class="btn btn-xs btn-default" href="{{ route('admin.tags.edit', $tag->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{ $tag->name }}"><i class="fa fa-trash-o"></i> Delete</button>
                        {{ HTML::deleteModal($tag->name,'admin.tags','tag', $tag->id) }}
                    </td>
                </tr>
                @empty
                    <p class="text-muted">Get started by creating a new tag</p>
                @endforelse
            </tbody>
        </table>
  </div>
</div>

<hr>

<h3>Add New Tag</h3>

<div class="col-md-6">
    {{ Form::open(['route' => 'admin.tags.store', 'method' =>'post', 'class' => 'form-horizontal']) }}

    {{ Form::textField('name', 'Tag Name', 'Tag Name') }}

    {{ Form::submitField('Save New Tag') }}

    {{ Form::close() }}
</div>

@stop