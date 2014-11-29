<?php

return [
    /*
	|--------------------------------------------------------------------------
	| Filters
	|--------------------------------------------------------------------------
	*/

    // Guest filter
    'only_guest' => 'Your already logged in',
    // Auth filter
    'only_auth' => 'You need to login',
    // Admin filter
    'only_admin' => 'Your not the admin',
    // Owner filter
    'only_owner' => 'Only owners of this :resource_singular can perform this action',

    /*
	|--------------------------------------------------------------------------
	| UserController
	|--------------------------------------------------------------------------
	*/

    // processSignUp()
    'signup_success' => 'To activate your account, please check your email for instructions or ',
    // processLogin()
    'login_success' => 'Your have successfully logged in',
    'unactivated_account' => 'Account activation is Pending. Check your email for the activation code or ',
    'invalid_credentials' => 'Invalid Credentials - Your email/username or password is incorrect',
    // Activate()
    'activation_success' => 'Your account is now Activated',
    'activation_failure' => 'Invalid activation code. Your account could not be activated',
    // Logout()
    'logout' => 'You have logged out',
    // ResendActivationCode()
    'account_activated' => 'Your account is already activated',
    'activation_code_resent' => 'Activation Code was resent to your email',
    'email_not_found' => 'Your email is not registered',

    /*
	|--------------------------------------------------------------------------
	| AccountController
	|--------------------------------------------------------------------------
	*/

    // settingsSave()
    'settings_saved' => 'Your Settings were changed successfully',
    // profileSave()
    'profile_updated' => 'Profile was updated successfully',
    // passwordSave()
    'unique_password_required' => 'Your Current password and New password are the same',
    'password_saved' => 'Your Password was changed successfully',
    'password_incorrect' => 'Your Current password is incorrect',
    // deleteAccount()
    'account_deleted' => 'Your account and all associated data has been deleted',

    /*
	|--------------------------------------------------------------------------
	| PostsController
	|--------------------------------------------------------------------------
	*/
    'post_created' => 'Post created',
    'post_updated' => 'Post updated',
    'post_deleted' => 'Post deleted',

    /*
	|--------------------------------------------------------------------------
	| PagesController
	|--------------------------------------------------------------------------
	*/
    // feedbackSave()
    'feedback_submitted' => 'Thanks for your feedback. We will be in touch soon',

    /*
	|--------------------------------------------------------------------------
	| PostsController
	|--------------------------------------------------------------------------
	*/
    // restoreUser()
    'user_restored' => 'User account and data has been restored',
];