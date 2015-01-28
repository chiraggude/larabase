<?php

class Throttle extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'throttle';

	protected $fillable = ['user_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}


}