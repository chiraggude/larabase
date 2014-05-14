<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

            <p>Hello {{ $user->username }},</p>
            
            <b>If you are having problems accessing your account, reset your password by clicking the button below:</b>

            {{ URL::to('password/reset', array($token)) }}

            <p>Thanks</p>
            <p>Team Turizon</p>

	</body>
</html>
