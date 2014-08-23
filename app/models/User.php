<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, SoftDeletingTrait;

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
    protected $hidden = array('password', 'remember_token');

    /**
     * LaraBase
     *
     */
    protected $dates = ['deleted_at'];

    // Date Mutator to convert the following fields into instances of Carbon
    public function getDates()
    {
        return array('created_at', 'updated_at', 'last_activity', 'last_login');
    }

    // data entities that can be saved to the database via Mass Assginments
    protected $fillable = ['username','email','password','first_name','last_name'];

    // Mutator method to automatically hash the password
    /*public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make('$password');
    }*/

    // Accessor method to get User's full name
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Validation rules for user login
    public static $login_rules = [
        'email_or_username' => 'required|min:3',
        'password' => 'required'
    ];

    // Validation rules for user login
    public static $registration_rules = [
        'username'  => 'required|unique:users|min:3',
        'email'  => 'required|email|unique:users',
        'password' => 'required|min:8',
        'password_confirm' => 'required|same:password'
    ];

    // Validation rules for user initiated password change
    public static $change_password_rules = [
        'current_password'  => 'required',
        'new_password' => 'required|min:6',
        'new_password_confirmation' => 'required|same:new_password',
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


    // Eloquent Relationships
    public function posts()
    {
        return $this->hasMany('Post');
    }


}