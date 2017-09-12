<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Throttle extends Model {

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

	protected $fillable = ['user_id','ip_address'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}


}