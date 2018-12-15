<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
	public $timestamps = false;
	protected $table = 'web_config';
	protected $fillable = [
	   'key',
	   'value'
	];
}
