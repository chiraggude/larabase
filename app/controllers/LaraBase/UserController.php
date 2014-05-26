<?php


class UserController extends BaseController {

    // Displays the form for account creation
    public function index()
    {
        $users = User::paginate(10);
        return View::make('users.index', compact('users'));
    }

    public function indexTable()
    {
        $users = User::paginate(10);
        return View::make('users.index', compact('users'));
    }

    // Displays the form for account creation
    public function publicProfile($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        return View::make('users.public_profile', compact('user'));
    }


    // Displays the registration form for account creation

    public function register()
    {
        return View::make('auth.register');
    }


    // Stores new account, completes registration and sends activation email

    public function processRegister()
    {
        $data = Input::all();
        $validator = User::validate_registration($data);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));
        }
        $code = str_random(70);
        $user = new User;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->activation_code = $code;
        $user->activated =  0;
        $user->save();
        //$user->email is out of scope for the mail closure, hence to access it, we have defined "use ($user)"
        Mail::send('emails.users.activate', ['link' => URL::route('activate', $code), 'username' => Input::get('username')], function($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Activate Your Account');
        });
        $notice = 'Your account was created. Before logging in, you need to activate your account. Please check your email for instructions.';
        return Redirect::action('AuthController@login')->withInfo($notice);
    }


    // Displays the login form

    public function login()
    {
        return View::make('auth.login');
    }


    // Attempt to do login

    public function processLogin()
    {
        $data = Input::all();
        $validator = User::validate_login($data);
        if ($validator->fails())    {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        }
        else {
            $user = User::where('email', '=', Input::get('email'))->first();
            if ( ! $user == null) {  // Check if user in DB
                if ( $user->activated == 0)  {  // Check if user is activated
                    return Redirect::back()->withWarning('Account Activation is pending. We have already sent you an Activation Email. Resend activation email');
                }
                $attempt = Auth::attempt(['email' => $data['email'], 'password' => $data['password']], Input::get('remember'));
                if ( $attempt == true) {  // Check if user was authenticated
                    return Redirect::intended('dashboard')->withSuccess('Your have successfully logged in!');
                }
                return Redirect::back()->withInput(Input::except('password'))->withError('Invalid Credentials! Your email or password is incorrect.');
            }
            return Redirect::back()->withInput(Input::except('password'))->withError('Invalid Credentials! Your email or password is incorrect.');
        }
    }


    // Attempt to activate account with code

    public function activate($code)
    {
        $user = User::where('activation_code', '=', $code)->where('activated', '=', 0)->first();
        if ($user->exists) {
            $user->activated = 1;
            $user->save();
            return Redirect::to('login')->withSuccess('Your Account is now Activated! You can now login');
        }
        return Redirect::to('login')->withError('Invalid Activation Code: Your account could not be activated. Resend activation email');
    }


    // Logout the user out of the application.

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login')->withInfo('You have logged out!');
    }



}