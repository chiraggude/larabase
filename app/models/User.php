<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    /**
     * CPG
     *
     */

    // data entities that can be saved to the database eg: title, content (leave empty for all)
    protected $fillable = ['username','email', 'password'];

    // Method (a.k.a laravel mutator) to automatically hash the password whenever it is saved to DB (via migrations, controllers etc.)
    // Commented out because some passwords were hashed twice. Before uncommenting remove all mentions of Hash::make across codebase
    /*public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make('$password');
    }*/

    // Add your validation rules for user login
    public static $login_rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    // Add your validation rules for user login
    public static $registration_rules = [
        'username'  => 'required|unique:users|min:3',
        'email'  => 'required|email|unique:users',
        'password' => 'required|min:6',
        'password_confirm' => 'required|same:password'
    ];


    // Add your validation rules for user initiated password change
    public static $change_password_rules = [
        'current_password'  => 'required',
        'new_password' => 'required|min:6',
        'new_password_confirmation' => 'required|same:new_password'
    ];

    // Creating a method for the Controller to call to and pass the data
    // public static so that we can call this Model from the Controller
    public static function validate_login($data){
        return Validator::make($data, static::$login_rules);
    }

    public static function validate_registration($data){
        return Validator::make($data, static::$registration_rules);
    }

    public static function validate_profile($data, $user){
        $profile_rules = [
            'first_name'  => 'min:2',
            'last_name'  => 'min:2',
            'username'  => 'required|min:3|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id
        ];
        return Validator::make($data, $profile_rules);
    }

    public static function validate_change_password($data){
        return Validator::make($data, static::$change_password_rules);
    }



}