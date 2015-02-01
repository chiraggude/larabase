<?php

class Profile extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';

	protected $fillable = ['user_id', 'location', 'avatar', 'first_name', 'last_name'];

	// Accessor method to get the Avatar of the User Profile
	public function getAvatarFilenameAttribute()
	{
		if (!$this->avatar)
		{
			return 'default_avatar.jpg';
		}
		return $this->avatar;
	}

	public static function validate_personal_info($data){
		$rules = [
			'first_name'  => 'required|min:2',
			'last_name'  => 'required|min:2',
			'location'  => 'required|min:2'
		];
		return Validator::make($data, $rules);
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}