@extends('layouts.master')
@section('content')

<h1>Feedback</h1>
</br>
<p>Please get in touch with us if you have any feedback, business inquiries or other questions</p>
</br>
<div class="col-md-6">

        {{ Form::open(array('action' => 'HomeController@feedbackSave' , 'class' => 'form-horizontal')) }}

        {{ Form::textField('full_name', 'Your Name', 'John Doe') }}

        {{ Form::emailField('email', 'Your Email', 'name@example.com') }}

        {{ Form::textField('topic', 'Topic', 'What is your message about?') }}

        {{ Form::textareaField('message_body', 'Your Message', 'Start writing...') }}

        {{ cancel_button() }}

        {{ Form::submitField('Submit Feedback') }}

        {{ Form::close() }}

</div>

@stop