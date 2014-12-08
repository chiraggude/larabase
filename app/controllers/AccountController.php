<?php

class AccountController extends \BaseController {


    //  Show User Dashboard

    public function dashboard()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        $user_posts = $user->posts->count();
        $posts = Post::all()->count();
        $feedback = Feedback::all()->count();
        return View::make('account.dashboard', compact('user','posts','users','user_posts', 'feedback'));
    }


    //  Show Account Profile of User

    public function profile()
    {
        $user = Auth::user();
        return View::make('account.profile', compact('user'));
    }


    // Edit User Profile

    public function profileEdit()
    {
        $user = Auth::user();
        return View::make('account.profile-edit', compact('user'));
    }


    // Save Changes to User Profile

    public function profileSave()
    {
        $user = Auth::user();
        $data = Input::all();
        $validator = User::validate_profile($data, $user);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user->update($data);
        return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_updated'));
    }


    // Change Account Password

    public function passwordChange()
    {
        return View::make('account.password-change');
    }


    // Save new Password

    public function passwordSave()
    {
        $data = Input::all();
        $validator = User::validate_change_password($data);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $user = Auth::user();
            $current_password = $data['current_password'];
            $new_password = $data['new_password'];
            if(Hash::check($current_password, $user->getAuthPassword()))
            {
                if ($current_password == $new_password) {
                    return Redirect::back()->withWarning(Lang::get('larabase.unique_password_required'));
                }
                $user->password = Hash::make($new_password);
                $user->save();
                return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_changed'));
            }
            return Redirect::back()->withError(Lang::get('larabase.password_incorrect'));
        }
    }


    //  Show Account Settings

    public function settings()
    {
        $user = Auth::user();
        $example_settings = ['Value', 'Value', 'Value'];
        $example_values = ['Setting 1', 'Setting 2', 'Setting 3'];
        return View::make('account.settings', compact('user', 'example_settings', 'example_values'));
    }


    public function settingsEdit()
    {
        $user = Auth::user();
        // Use a helper function to get list of timezones
        $timezones = getTimezones();
        return View::make('account.settings-edit', compact('user', 'timezones'));
    }


    public function settingsSave()
    {
        $user = Auth::user();
        $user->timezone = Input::get('timezone');
        $user->save();
        return Redirect::to('settings')->withSuccess(Lang::get('larabase.settings_saved'));
    }


    public function deleteAccount()
    {
        $user = Auth::user();
        Post::whereUserId($user->id)->delete();
        Auth::logout();
        if($user->delete())
        return Redirect::to('login')->withInfo(Lang::get('larabase.account_deleted'));
    }

}