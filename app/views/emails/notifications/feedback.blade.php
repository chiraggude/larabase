@extends('layouts.emails.master')
@section('content')

    <h4>Hi, Admin</h4>

    <h1>Notification: Feedback was submitted </h1>

    <h4>NAME: {{ $full_name }} </h4>

    <h4>EMAIL: {{ $email }} </h4>

    <h4>TOPIC: {{ $topic }} </h4>

    <h4>MESSAGE</h4>
    <p> {{ $message_body }} </p>

@stop