<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

            <p>Hello {{ $user->username }},</p>

            <b>Access the following link to change your password</b>

            {{ URL::to('password/reset', array($token)) }}

            <p>Thanks</p>
            <p>Team Turizon</p>

	</body>
</html>
