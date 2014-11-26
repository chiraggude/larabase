<?php


class UserController extends BaseController {


    // Display all Users

    public function index()
    {
        $users = User::paginate(12);
        return View::make('user.index', compact('users'));
    }


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
        $user = new User;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->activation_code = $code;
        $user->activated =  0;
        $user->save();
        $activation_link = URL::route('activate', $code);
        //$user->email is out of scope for the mail closure, hence to access it, we have defined "use ($user)"
        Mail::send('emails.users.activate', ['link' => $activation_link, 'username' => Input::get('username')], function($message) use($user) {
            $message->to($user->email, $user->username)->subject('Activate Your Account');
        });
        return Redirect::action('UserController@login')->withActivationMessage(Lang::get('larabase.signup_success'));
    }


    // Display the Login form

    public function login()
    {
        return View::make('auth.login');
    }


    // Attempt to Login user

    public function processLogin()
    {
        $data = Input::all();
        $validator = User::validate_login($data);
        if ($validator->fails())    {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        }
        else {
            $user = User::where('email', '=', $data['email_or_username'])->orWhere('username', $data['email_or_username'])->first();
            if ( ! $user == null) {  // Check if user in DB
                if ( $user->activated == 0)  {  // Check if user is activated
                    return Redirect::back()->withActivationMessage(Lang::get('larabase.unactivated_account'));
                }
                $attempt = Auth::attempt(['email' => $user->email, 'password' => $data['password']], Input::get('remember'));
                if ( $attempt == true) {  // Check if user was authenticated
                    Event::fire('auth.login', array($user));
                    return Redirect::intended('dashboard')->withSuccess(Lang::get('larabase.login_success'));
            }
                return Redirect::back()->withInput(Input::except('password'))->withError(Lang::get('larabase.invalid_credentials'));
            }
            return Redirect::back()->withInput(Input::except('password'))->withError(Lang::get('larabase.invalid_credentials'));
        }
    }


    // Attempt to activate account with code

    public function activate($code)
    {
        $user = User::where('activation_code', '=', $code)->where('activated', '=', 0)->first();
        if ( ! $user == null) {
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
        if(! $user == null)
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