<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat_pendidikan extends Model
{
	public $timestamps = false;
	protected $table = 'riwayat_pendidikan';
	protected $fillable = [
	   'dosen_id',
	   'perguruan_tinggi',
	   'gelar',
	   'tgl_ijazah',
	   'jenjang'
	];
}
