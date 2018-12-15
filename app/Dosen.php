<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
	public $timestamps = false;
	protected $table = 'dosen';
	protected $fillable = [
	   'program_studi_id',
	   'nama',
	   'url',
	   'gelar',
	   'foto',
	   'pendidikan',
	   'profil'
	];
}
