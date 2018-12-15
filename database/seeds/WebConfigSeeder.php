<?php

use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'id' => "1",
            'name' => "Ersa Azis Mansyur",
            'email' => "eam24maret@gmail.com",
            'password' => '$2y$10$asx38g/vTi72w1Mx7LZ1Keg41wHAv91Rt6MSneAwvdlUxblZ1uk8e',
        ]);


        DB::table('web_config')->truncate();
        DB::table('web_config')->insert([
            'id' => "webName",
            'value' => "Profil Dosen",
        ]);
        DB::table('web_config')->insert([
            'id' => "webSub",
            'value' => "UIN Sunan Gunung Djati Bandung",
        ]);
        DB::table('web_config')->insert([
            'id' => "webKeyWords",
            'value' => "Profil,Dosen,Profil Dosen",
        ]);
        DB::table('web_config')->insert([
            'id' => "urlForlap",
            'value' => "https://forlap.ristekdikti.go.id/perguruantinggi/detail/MUE3NzMyREItRTBCNS00N0M5LUFBOEEtQ0RDOUEzOTJCRjQ5",
        ]);
        DB::table('web_config')->insert([
            'id' => "profilPT",
            'value' => "",
        ]);
    }
}
