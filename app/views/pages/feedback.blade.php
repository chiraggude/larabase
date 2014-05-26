@extends('layouts.master')
@section('content')

<h1>Feedback</h1>

<p>If you have any feedback, business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>

<div class="col-md-6">

        {{ Form::open(array('action' => 'HomeController@feedbackSave' , 'class' => 'form-horizontal')) }}

        {{ Form::textField('full_name', 'Your Full Name', 'John Doe') }}

        {{ Form::emailField('email', 'Your Email', 'name@example.com') }}

        {{ Form::textField('topic', 'Topic', 'What is your message about?') }}

        {{ Form::textareaField('message_body', 'Your Message', 'Start writing...') }}

        <a href='{{URL::previous()}}' class='btn btn-default pull-right'>Cancel</a>

        {{ Form::submitField('Submit Feedback') }}

        {{ Form::close() }}

</div>

@stop