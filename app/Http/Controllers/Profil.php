<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WebConfig;
use App\Program_studi;
use App\Dosen;
use App\Riwayat_mengajar;
use App\Riwayat_pendidikan;
use App\Riwayat_penelitian;

class Profil extends Controller
{
    public function index(){
    	$ps=Program_studi::all();
        $dosen=Dosen::inRandomOrder()->take(5)->get();      
        return view('welcome',['dosen' => $dosen,'ps' => $ps]);
    }
    public function profilUIN(){
        $profil=WebConfig::find('profilPT');
        $url=WebConfig::find('urlForlap');
        return view('profiluin',['url'=>$url->value,'profil' => $profil->value]);
    }
    public function profilProgramStudi($id){
    	$ps=Program_studi::find($id);
    	$dosen=Dosen::where("program_studi_id",$id)->get();
        return view('profilprogramstudi',['dosen' => $dosen,'ps' => $ps]);
    }
    public function programStudi(){
    	$ps=Program_studi::all();
        return view('programstudi',['ps' => $ps]);
    }
    public function profilDosen($id){
    	$dosen=Dosen::find($id);
    	$riwayatMengajar=Riwayat_mengajar::where("dosen_id",$id)->get();
    	$riwayatPendidikan=Riwayat_pendidikan::where("dosen_id",$id)->get();
    	$riwayatPenelitian=Riwayat_penelitian::where("dosen_id",$id)->get();
        return view('profildosen',[ 'dosen' => $dosen,
                                    'riwayatMengajar' => $riwayatMengajar,
                                    'riwayatPendidikan'=>$riwayatPendidikan,
                                    'riwayatPenelitian'=>$riwayatPenelitian]);
    }
    public function dosen(){
    	$dosen=Dosen::paginate(15);
        return view('dosen',['dosen' => $dosen]);
    }
    public function search(
//    	$type,$search
    	Request $request
    ){
    	$type=$request->type;
    	$search=$request->search;
    	switch ($type) {
    		case 'dosen':
                $ty="Dosen";
		    	$dosen=Dosen::where('nama', 'like', '%' . $search . '%')->take(20)->get();
                return view('search',['tipe'=>$type, 'type'=>$ty,'data' => $dosen]);
    			break;
    		case 'programstudi':
                $ty="Program Studi";
		    	$ps=Program_studi::where('nama', 'like', '%' . $search . '%')->take(20)->get();
                return view('search',['tipe'=>$type, 'type'=>$ty,'data' => $ps]);
    			break;
    		default:
    			return abort(404);
    			break;
    	}
    }
}
