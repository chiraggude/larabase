@extends('layouts.master')
@section('content')

<div class="col-md-6">

    {{ Form::model($category, ['route'=> ['admin.categories.update', $category->id], 'method' => 'PUT']) }}

    {{ Form::textField('name', 'Category Name', null) }}

    {{ Form::textField('description', 'Description', null) }}

    {{ cancel_button() }}

    {{ Form::submitField('Save Changes') }}

    {{ Form::close() }}

</div>

@stop