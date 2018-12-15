<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat_penelitian extends Model
{
	public $timestamps = false;
	protected $table = 'riwayat_penelitian';
	protected $fillable = [
	   'dosen_id',
	   'judul',
	   'bidang_ilmu',
	   'lembaga',
	   'tahun'
	];
}
