<?php

class AccountController extends BaseController {

	/** Show Account Settings  */
	public function settings()
	{
        $user = Auth::user();
        return View::make('auth.settings', compact('user'));
	}

    /** Show User Dashboard  */
    public function dashboard()
    {
        $user = Auth::user();
        return View::make('auth.dashboard', compact('user'));
    }


    /** Show User Profile  */
    public function profile()
    {
        $user = Auth::user();
        return View::make('auth.profile', compact('user'));

    }


    /** Edit User Profile  */
    public function profileEdit()
    {
        $user = Auth::user();
        return View::make('auth.profile_edit', compact('user'));
    }


    /** Save Changes to User Profile  */
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
        return Redirect::to('profile')->withSuccess('Profile was updated successfully');
    }


    // Change Account Password

    public function passwordChange()
    {
        return View::make('auth.password_change');
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
            $current_password = Input::get('current_password');
            $new_password = Input::get('new_password');
            if(Hash::check($current_password, $user->getAuthPassword()))
            {
                if ($current_password == $new_password) {
                    return Redirect::back()->withWarning('Your Current Password and New Password are the same');
                }
                $user->password = Hash::make($new_password);
                $user->save();
                return Redirect::to('profile')->withSuccess('Your Password was changed Successfully!');
            }
            return Redirect::back()->withError('Your Current Password is incorrect');
        }
    }

}