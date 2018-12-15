<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
	public $timestamps = false;
	protected $table = 'program_studi';
	protected $fillable = [
	   'nama',
	   'url',
	   'profil'
	];
}
