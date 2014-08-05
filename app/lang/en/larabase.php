<?php

return [
    /*
	|--------------------------------------------------------------------------
	| UserController
	|--------------------------------------------------------------------------
	*/

    // processRegister()
    'registration_success' => 'To Activate your account, please check your Email for instructions',
    // processLogin()
    'login_success' => 'Your have successfully logged in',
    'unactivated_account' => 'Account Activation is pending. We have already sent you an Activation Email. Resend activation email',
    'invalid_credentials' => 'Invalid Credentials - Your email/username or password is incorrect',
    // Activate()
    'activation_success' => 'Your Account is now Activated',
    'activation_failure' => 'Invalid Activation Code: Your account could not be activated. Resend activation email',
    // Logout()
    'logout' => 'You have logged out',

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