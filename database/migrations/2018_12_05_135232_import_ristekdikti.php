<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportRistekdikti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_studi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',150);
            $table->string('url',150);
            $table->text('profil');
        });    
        Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_studi_id')->unsigned();
            $table->string('nama',150);
            $table->string('url',150);
            $table->string('gelar',150);
            $table->string('foto',150);
            $table->string('pendidikan',150);
            $table->text('profil');
        });    
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
            $table->string('perguruan_tinggi',150);
            $table->string('gelar',150);
            $table->year('tgl_ijazah');
            $table->string('jenjang',150);			
        });    
        Schema::create('riwayat_mengajar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
            $table->string('semester',150);
            $table->string('kd_matkul',150);
            $table->string('nm_matkul',150);
            $table->string('kd_kelas',150);
            $table->string('perguruan_tinggi',150);
		});    
        Schema::create('riwayat_penelitian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
            $table->string('judul',150);
            $table->string('bidang_ilmu',150);
            $table->string('lembaga',150);
            $table->year('tahun');
        });    
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_studi');
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('riwayat_pendidikan');
        Schema::dropIfExists('riwayat_mengajar');
        Schema::dropIfExists('riwayat_penelitian');
    }
}
