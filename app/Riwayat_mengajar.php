<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat_mengajar extends Model
{
	public $timestamps = false;
	protected $table = 'riwayat_mengajar';
	protected $fillable = [
	   'dosen_id',
	   'semester',
	   'kd_matkul',
	   'nm_matkul',
	   'kd_kelas',
	   'perguruan_tinggi'
	];
}
