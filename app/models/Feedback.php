<?php

class Feedback extends \Eloquent {


    // The DB table for this model is explicitly set, by default Eloquent would assume the DB table would be 'feedbacks' (plural)
    protected $table = 'feedback';

    protected $fillable = ['full_name','email', 'topic', 'message_body'];

    public static $rules = [
        'full_name' => 'required|min:3',
        'message_body' => 'required|min:10',
        'topic' => 'required|min:3',
        'email' => 'required|email',
    ];

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }


}
