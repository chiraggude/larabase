@extends('layouts.master')
@section('content')

<h1><i class="fa fa-envelope"></i> Feedback</h1>
<hr>
<p>Get in touch with us if you have any feedback or questions</p>
<br>
<div class="col-md-6">

        {{ Form::open(array('action' => 'HomeController@feedbackSave' , 'class' => 'form-horizontal')) }}

        {{ Form::textField('full_name', 'Your Name', 'Name') }}

        {{ Form::emailField('email', 'Your Email', 'Email') }}

        {{ Form::textField('topic', 'Topic', 'What is your message about?') }}

        {{ Form::textareaField('message_body', 'Your Message', 'Start writing...') }}

        {{ cancel_button() }}

        {{ Form::submitField('Submit Feedback') }}

        {{ Form::close() }}

</div>

@stop