<?php

return [
    /*
	|--------------------------------------------------------------------------
	| Filters
	|--------------------------------------------------------------------------
	*/

    // Guest filter
    'only_guest' => 'You are already logged in',
    // Auth filter
    'only_auth' => 'You need to login',
    // Admin filter
    'not_authorized' => 'You are not Authorized to proceed',
    // Owner filter
    'only_owner' => 'Only owners of this :resource_singular can perform this action',

    /*
	|--------------------------------------------------------------------------
	| AuthController
	|--------------------------------------------------------------------------
	*/

    // processSignUp()
    'signup_success' => 'To activate your account, please check your email for instructions or ',
    // processLogin()
    'login_success' => 'Your have successfully logged in',
    'unactivated_account' => 'Account activation is Pending. Check your email for the activation code or ',
    'invalid_credentials' => 'Invalid Credentials - Your email/username or password is incorrect',
    'account_suspended' => 'Account Suspended - Your account is temporarily suspended for security reasons. It will be active in :suspend_duration minutes',
    'account_banned' => 'Account Banned - Your account is currently locked-down for security reasons. Please get in touch with us',
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
	| Admin - UsersController
	|--------------------------------------------------------------------------
	*/
    // restoreUser()
    'user_restored' => 'User account and data has been restored',
    // banUser()
    'user_ban' => 'User account has been banned',
    // revokeBanUser()
    'user_ban_revoke' => 'User account ban has been revoked',
];