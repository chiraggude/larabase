<?php

class Throttle extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'throttle';

	// Date Mutator to convert the following fields into instances of Carbon
	public function getDates()
	{
		return array('last_attempt', 'last_activity', 'last_login');
	}

	protected $fillable = ['user_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}


}