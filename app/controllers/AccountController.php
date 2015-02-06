<?php

class AccountController extends \BaseController {


    //  Show User Dashboard

    public function dashboard()
    {
        $user = Auth::user();
        $user_posts = $user->posts->count();
        return View::make('account.dashboard', compact('user','user_posts'));
    }


    // Change Account Password

    public function passwordChange()
    {
        return View::make('account.password-change');
    }


    // Save new Password

    public function passwordSave()
    {
        $validator = User::validate_change_password($data = Input::all());
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
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
            return Redirect::to('profile')->withSuccess(Lang::get('larabase.password_saved'));
        }
        return Redirect::back()->withError(Lang::get('larabase.password_incorrect'));
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