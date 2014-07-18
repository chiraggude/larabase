<?php

class Post extends \Eloquent {


	// Add your validation rules for this Model
	public static $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:10',
        'category' => 'required|min:3',
        'tag' => 'required|min:3',
        'status' => 'required',
        'visibility' => 'required'
	];

	// data entities that can be saved to the database eg: title, content (leave empty for all)
	// protected $fillable = [];

    // The guarded property specifies which attributes should not be mass-assignable -
    // Increases security when storing data with Input::all()
    protected $guarded = array('id', 'created_at', 'updated_at', 'user_id');

    // Creating a method for the Controller to call to and pass the data
    // public static so that we can call this Model from the Controller
    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

}