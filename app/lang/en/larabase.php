<?php

return [
    /*
	|--------------------------------------------------------------------------
	| UserController
	|--------------------------------------------------------------------------
	*/

    // processRegister()
    'registration_success' => 'To activate your account, please check your email for instructions or ',
    // processLogin()
    'login_success' => 'Your have successfully logged in',
    'unactivated_account' => 'Account activation is Pending. Check your email for the activation code or',
    'invalid_credentials' => 'Invalid Credentials - Your email/username or password is incorrect',
    // Activate()
    'activation_success' => 'Your Account is now Activated',
    'activation_failure' => 'Invalid Activation Code: Your account could not be activated',
    // Logout()
    'logout' => 'You have logged out',
    // ResendActivationCode()
    'account_activated' => 'Your account is already activated',
    'activation_code_resent' => 'Activation Code was sent to your email',
    'email_not_found' => 'Your email is not registered',

    /*
	|--------------------------------------------------------------------------
	| AccountController
	|--------------------------------------------------------------------------
	*/

    // settingsSave()
    'settings_saved' => 'Your Settings were changed Successfully',
    // profileSave()
    'profile_updated' => 'Profile was updated Successfully',
    // passwordSave()
    'unique_password_required' => 'Your Current Password and New Password are the same',
    'password_saved' => 'Your Password was changed Successfully',
    'password_incorrect' => 'Your Current Password is incorrect',

    /*
	|--------------------------------------------------------------------------
	| PostController
	|--------------------------------------------------------------------------
	*/
    'post_created' => 'Post created',
    'post_updated' => 'Post updated',
    'post_deleted' => 'Post deleted',

    /*
	|--------------------------------------------------------------------------
	| HomeController
	|--------------------------------------------------------------------------
	*/
    'feedback_submitted' => 'Thanks for your feedback. We will be in touch soon!',

];