<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Support\Facades\Validator;

// larabase
// use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
// class User extends Authenticatable implements UserInterface, RemindableInterface 
{

    use Notifiable,
    // UserTrait,     RemindableTrait,
    SoftDeletes;

    
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
        protected $hidden = array('password', 'remember_token', 'activation_code', 'activated', 'deleted_at', 'updated_at');
    
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
        protected $fillable = ['username','email','password'];
    
        // Mutator method to automatically hash the password
        /*public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = Hash::make('$password');
        }*/
    
        // Accessor method to get User's full name
        public function getFullNameAttribute() {
    
            if($this->profile->first_name == null || $this->profile->last_name == null)
            {
                return $this->username;
            }
            return $this->profile->first_name . ' ' . $this->profile->last_name;
        }
    
        // Check if User is Admin
        public function isAdmin()
        {
            return $this->hasRole('admin');
        }
    
        // Check if User is the Owner of the object
        public function isOwner($object)
        {
            if($this->id == $object->user_id || $this->hasRole('admin'))
            {
                return true;
            }
            return false;
        }
    
        // Check if User's role can perform an action
        // public function can($name)
        // {
        //     foreach($this->roles as $role)
        //     {
        //         foreach($role->permissions as $permission)
        //         {
        //             if($permission->name == $name) return true;
        //         }
        //         return false;
        //     }
        //     return false;
        // }
    
        // Check if User has a Role
        public function hasRole($name)
        {
            foreach($this->roles as $role)
            {
                if($role->name == $name) return true;
            }
            return false;
        }
    
        // Assign Role to the User
        public function assignRole($role)
        {
            $this->roles()->sync($role);
        }
    
        // Assign Member role to the User
        public function assignMemberRole()
        {
            $this->assignRole([2]);
        }
    
        // Revoke User's Role
        public function revokeRole($role)
        {
            $this->roles()->detach($role);
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
    
        public static function validate_account_info($data, $user){
            $rules = [
                'username'  => 'required|min:3|unique:users,username,'.$user->id,
                'email' => 'required|email|unique:users,email,'.$user->id
            ];
            return Validator::make($data, $rules);
        }
    
        public static function validate_change_password($data){
            return Validator::make($data, static::$change_password_rules);
        }
    
    
        // Eloquent Relationships
    
        public function posts()
        {
            return $this->hasMany('App\Post');
        }
    
        public function throttle()
        {
            return $this->hasOne('App\Throttle');
        }
    
        public function profile()
        {
            return $this->hasOne('App\Profile');
        }
    
        public function roles()
        {
            return $this->belongsToMany('App\Role')->withTimestamps();
        }
    
    
    }

