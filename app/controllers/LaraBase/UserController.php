<?php


class UserController extends BaseController {


    // Display all Users

    public function index()
    {
        $users = User::paginate(10);
        return View::make('user.index', compact('users'));
    }


    // Display the registration form for account creation

    public function register()
    {
        return View::make('auth.register');
    }


    // Save registration details, create user account and send activation email

    public function processRegister()
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
        return Redirect::action('UserController@login')->withInfo(Lang::get('larabase.registration_success'));
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
                    return Redirect::back()->withWarning(Lang::get('larabase.unactivated_account'));
                }
                $attempt = Auth::attempt(['email' => $user->email, 'password' => $data['password']], Input::get('remember'));
                if ( $attempt == true) {  // Check if user was authenticated
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
            $user->save();
            return Redirect::to('login')->withSuccess(Lang::get('larabase.activation_success'));
        }
        return Redirect::to('login')->withError(Lang::get('larabase.activation_failure'));
    }


    // Logout the user

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login')->withInfo(Lang::get('larabase.logout'));
    }



}