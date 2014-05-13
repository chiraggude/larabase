@extends('layouts.master')
@section('content')

<h1>Contact</h1>
<p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>

        {{ Form::open(array('route' => 'reports.store', 'method' =>'post', 'role'=>'form')) }}
        <div class='form-group'>
            {{ Form::label('name', 'Your Name') }}
            {{ Form::text('name', Input::old('title'), array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('email', 'Your Email') }}
            {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('subject', 'What is the message about?') }}
            {{ Form::text('subject', Input::old('subject'), array('class'=>'form-control')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('message', 'Your Message') }}
            {{ Form::textarea('message', Input::old('message'), array('class'=>'form-control')) }}
        </div>
        <a href='{{URL::previous()}}' class='btn btn-default pull-right'>Cancel</a>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}

@stop