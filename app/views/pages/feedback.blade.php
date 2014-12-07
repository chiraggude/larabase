@extends('layouts.master')

@section('ajax-notifications')
        @include("layouts/notifications-ajax")
@stop

@section('content')
        <h1>Feedback</h1>
        <hr>
        <p class="text-muted">Get in touch with us if you have any feedback or questions</p>
        <div class="col-md-6">

                {{ Form::open(['action' => 'PagesController@saveFeedback' , 'class' => 'form-horizontal', 'data-remote']) }}

                {{ Form::textField('full_name', 'Your Name', 'Name') }}

                {{ Form::emailField('email', 'Your Email', 'Email') }}

                {{ Form::textField('topic', 'Topic', 'What is your message about?') }}

                {{ Form::textareaField('message_body', 'Your Message', 'Start writing...') }}

                {{ cancel_button() }}

                {{ Form::submitField('Submit Feedback') }}

                {{ Form::close() }}

        </div>
@stop