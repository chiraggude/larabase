<?php

class ProfileController extends \BaseController {


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


	// Save Changes to the Profile's account info

	public function accountInfo()
	{
		$validator = User::validate_account_info($data = Input::all(), $user = Auth::user());
		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$user->update($data);
		return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_updated'));
	}


	// Save Changes to the Profile's personal info

	public function personalInfo()
	{
		$validator_info = Profile::validate_personal_info($data = Input::all());
		if ($validator_info->fails()) {
			return Redirect::back()->withInput()->withErrors($validator_info);
		}
		$user = Auth::user();
		Profile::updateOrCreate(['user_id' => $user->id], $data);
		return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_updated'));
	}


	// Upload new Profile Avatar

	public function avatarUpload()
	{
		if (Input::hasFile('avatar'))
		{
			$validator = Validator::make(['avatar' => $avatar = Input::file('avatar')],['avatar' => 'image|mimes:jpeg,bmp,png|max:2048']);
			if ($validator->fails())
			{
				return Redirect::back()->withInput()->withErrors($validator);
			}
			$user = Auth::user();
			if($user->profile->avatar) {
				$oldFile = public_path('uploads/avatars/').$user->profile->avatar;
				File::delete($oldFile);
			}
			$filename = time() .'-'. $avatar->getClientOriginalName();
			$avatar->move('uploads/avatars', $filename);
			$user->profile->avatar = $filename;
			$user->profile->save();
			return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_updated'));
		}
		return Redirect::back();
	}

}