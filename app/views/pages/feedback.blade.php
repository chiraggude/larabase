@extends('layouts.master')
@section('content')

<h1>Contact</h1>
<p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>

        {{ Form::open(array('action' => 'HomeController@feedbackSave' )) }}

        {{ Form::textField('full_name', 'Your Full Name', 'John Doe') }}

        {{ Form::emailField('email', 'Your Email', 'yourname@example.com') }}

        {{ Form::textField('topic', 'Topic', 'What is your message about?') }}

        {{ Form::textareaField('message_body', 'Your Message', 'Start writing...') }}

        <a href='{{URL::previous()}}' class='btn btn-default pull-right'>Cancel</a>

        {{ Form::submitField('Submit', 'btn btn-primary') }}

        {{ Form::close() }}

@stop