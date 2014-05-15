@extends('layouts.emails.master')
@section('content')

		<h2>Account Activation</h2>

            <p> Hello, {{ $username }},</p>

            <b>Please access the link below to activate your account.</b>

            {{ $link }}

            <p>Thanks</p>
            <p>LaraBase</p>

@stop
