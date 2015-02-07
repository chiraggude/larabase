<?php

class AuthController extends \BaseController {

	// Display the registration form for account creation

	public function signUp()
	{
		return View::make('auth.sign-up');
	}


	// Save registration details, create user account and send activation email

	public function processSignUp()
	{
		$data = Input::all();
		$validator = User::validate_registration($data);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));
		}
		$code = str_random(32);
		$user = User::create(['username'=>$data['username'], 'email'=>$data['email'], 'password'=> Hash::make($data['password']), 'activation_code'=> $code, 'activated'=> 0]);
		$user->assignMemberRole();
		Throttle::create(['user_id'=> $user->id]);
		Profile::create(['user_id'=> $user->id]);
		$activation_link = URL::route('activate', $code);
		//$user->email is out of scope for the mail closure, hence to access it, we have defined "use ($user)"
		Mail::send('emails.users.activate', ['link' => $activation_link, 'username' => Input::get('username')], function($message) use($user) {
			$message->to($user->email, $user->username)->subject('Activate Your Account');
		});
		return Redirect::to('login')->withActivationMessage(Lang::get('larabase.signup_success'));
	}


	// Display the Login form

	public function login()
	{
		return View::make('auth.login');
	}


	// Attempt to Login user

	public function processLogin()
	{
		$validator = User::validate_login($data = Input::all());
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		}
		else {
			$user = User::where('email', '=', $data['email_or_username'])->orWhere('username', $data['email_or_username'])->first();
			// Check if user found in DB
			if ($user) {
				// Check if user is activated
				if ($user->activated == 0)  {
					return Redirect::back()->withActivationMessage(Lang::get('larabase.unactivated_account'));
				}
				// Check if user is suspended
				$suspend_duration = '15';
				if($user->throttle->suspended) {
					// Find time since last login attempt. Throttle login if it is less than suspend_duration
					if($user->throttle->last_attempt->diffInMinutes(Carbon\Carbon::now()) < $suspend_duration) {
						return Redirect::back()->withWarning(Lang::get('larabase.account_suspended', ['suspend_duration' => $suspend_duration]));
					}
					Event::fire('user.revoke_suspend', [$user->id]);
				}
				// Check if user is banned
				if($user->throttle->banned) {
					return Redirect::back()->withWarning(Lang::get('larabase.account_banned'));
				}
				// Attempt to authenticate the User
				$attempt = Auth::attempt(['email' => $user->email, 'password' => $data['password']], Input::get('remember'));
				if($attempt) {
					Event::fire('auth.login', array($user));
					return Redirect::intended('dashboard')->withSuccess(Lang::get('larabase.login_success'));
				}
				// On failed login attempt, update the Throttle table
				DB::table('throttle')->whereUserId($user->id)->update(['last_attempt' => new DateTime()]);
				if($user->throttle->attempts == 5) {
					DB::table('throttle')->whereUserId($user->id)->update(['suspended' => TRUE, 'attempts' => '0', 'last_attempt' => new DateTime()]);
				}
				DB::table('throttle')->whereUserId($user->id)->increment('attempts');
				return Redirect::back()->withInput(Input::except('password'))->withError(Lang::get('larabase.invalid_credentials'));
			}
			return Redirect::back()->withInput(Input::except('password'))->withError(Lang::get('larabase.invalid_credentials'));
		}
	}


	// Attempt to activate account with code

	public function activate($code)
	{
		$user = User::where('activation_code', '=', $code)->where('activated', '=', 0)->first();
		if($user) {
			$user->activated = 1;
			$user->activation_code = null;
			$user->save();
			return Redirect::to('login')->withSuccess(Lang::get('larabase.activation_success'));
		}
		return Redirect::to('login')->withError(Lang::get('larabase.activation_failure'));
	}


	// Show Resend Activation Code form

	public function resendActivation()
	{
		return View::make('auth.resend-activation');
	}


	// Resend Activation Code

	public function resendActivationCode()
	{
		$user = User::where('email', '=', Input::get('email'))->first();
		if($user)
		{
			if($user->activated == 1)
			{
				return Redirect::back()->withWarning(Lang::get('larabase.account_activated'));
			}
			$code = str_random(32);
			$user->activation_code = $code;
			$user->save();
			$activation_link = URL::route('activate', $code);
			Mail::send('emails.users.activate', ['link' => $activation_link, 'username' => Input::get('username')], function($message) use($user) {
				$message->to($user->email, $user->username)->subject('Activate your Account');
			});
			return Redirect::to('login')->withSuccess(Lang::get('larabase.activation_code_resent'));
		}
		return Redirect::back()->withError(Lang::get('larabase.email_not_found'));
	}


	// Logout the user

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login')->withInfo(Lang::get('larabase.logout'));
	}

}