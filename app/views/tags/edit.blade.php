@extends('layouts.master')
@section('content')

<div class="col-md-6">

    {{ Form::model($tag, ['route'=> ['admin.tags.update', $tag->id], 'method' => 'PUT']) }}

    {{ Form::textField('name', 'Tag', null) }}

    {{ cancel_button() }}

    {{ Form::submitField('Save Changes') }}

    {{ Form::close() }}

</div>

@stop