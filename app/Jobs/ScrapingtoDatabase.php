<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\WebConfig;
use App\Program_studi;
use App\Dosen;
use App\Riwayat_mengajar;
use App\Riwayat_pendidikan;
use App\Riwayat_penelitian;
use Log;
class ScrapingtoDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $tahap;
    protected $url;
    protected $id;
	public function __construct($t=1,$u=null,$i=null)
    {
		$this->tahap=$t;
		$this->url=$u;
		$this->id=$i;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {	
    	switch ($this->tahap) {
    		case 1:
				Dosen::truncate();
				Program_studi::truncate();
				Riwayat_mengajar::truncate();
				Riwayat_pendidikan::truncate();
				Riwayat_penelitian::truncate();

				$urlForlap = WebConfig::find('urlForlap')->value;
				$this->scrapingPT($urlForlap);

				$program_studi=Program_studi::all();
				foreach ($program_studi as $ps) {
					$this->dispatch(2,$ps->url,$ps->id)->onQueue('scraping');
				}
    		break;
    		case 2:
				$this->scrapingPS($this->url,$this->id);
				$dosen=Dosen::where("program_studi_id",$this->id)->get();
				foreach ($dosen as $d) {
					if($d->url != "" and $d->id != "")
					$this->dispatch(3,$d->url,$d->id)->onQueue('scraping');
				}
    		break;
    		case 3:
				$this->scrapingD($this->url,$this->id);
    		break;
    		case 4:
				$this->scrapingD($this->url,$this->id);
    		break;
    	}
		//$this->scrapingPS($urlForlap);
    }
	/**
		SCRAPING FORLAP
	**/
	private function scrapingPT($urlForlap){
		$dataPT=$this->getDataPT($urlForlap);
		
		//profil PT
		$updateProfilPT = WebConfig::where('id', "profilPT")
		  ->update(['value' => mb_strtolower($dataPT['profil'])]);
		
		//program studi PT
		$insertProgramStudi = Program_studi::insert($dataPT['program_studi']);
	}
	private function scrapingPS($urlForlap,$id){
		$dataPS=$this->getProgramStudi($urlForlap,$id);
		$updateProfilPT = Program_studi::where('url', $urlForlap)
		  ->update(['profil' => mb_strtolower($dataPS['profil'])]);

		$insertDosen = Dosen::insert($dataPS['dosen']);
	}
	private function scrapingD($urlForlap,$id){
		$dataD=$this->getDosen($urlForlap,$id);
		$updateProfilPT = Dosen::where('url', $urlForlap)
		  ->update(['profil' => mb_strtolower($dataD['profil']),'foto' => $dataD['foto']]);

		if(!empty($dataD['riwayat_pendidikan']))
			$insertRiwayatPendidikan = Riwayat_pendidikan::insert($dataD['riwayat_pendidikan']);
		if(!empty($dataD['riwayat_mengajar']))
			$insertRiwayatMengajar = Riwayat_mengajar::insert($dataD['riwayat_mengajar']);
		if(!empty($dataD['riwayat_penelitian']))
			$insertRiwayatPenelitian = Riwayat_penelitian::insert($dataD['riwayat_penelitian']);
	}
	/**
		SCRAPING FORLAP
	**/
	private function getDataPT($url){
		$hasil=array(
			"profil"=>"",
			"program_studi"=>array()
		);
		
		$data=file_get_contents($url);
		//profil
		preg_match("/<table class='table1'>(.*?)<\/table>/si", $data, $profil);
		//program_studi
		preg_match_all('/<td><a href="(.*?)<\/a><\/td>/si', $data, $program_studi);
		$hasil['profil']=$profil[0];
		foreach($program_studi[1] as $data){
			$data=explode('">',$data);
			$hasil['program_studi'][]=array('nama'=>$data[1],'url'=>$data[0],'profil'=>"");
		}
			
		return $hasil;
	}
    private function getProgramStudi($url,$id){
		$hasil=array(
			"dosen"=>array(
				array(
					'nama'=>"",
					'program_studi_id'=>$id,
					'url'=>"",
					'gelar'=>"",
					'pendidikan'=>"",
					'profil'=>"",
					'foto'=>"",
				)
			)
		);
		
		$data=file_get_contents($url);
		preg_match("/<table class='table1'>(.*?)<\/table>/si", $data, $profil);
		preg_match("/<div class='tab-pane' id='dosen'>.*?<table class=\"table table-bordered\">(.*?)<\/table>.*?<\/div>/si", $data, $dosen);
		preg_match_all('/<tr>.*?<td>.*?<\/td>.*?<td><a href="(.*?)<\/a><\/td>.*?<td>(.*?)<\/td>.*?<td class="tcenter">(.*?)<\/td>.*?<td>.*?<\/td>.*?<\/tr>/si', $dosen[1], $dosen);
		$hasil["profil"]=$profil[0];
		for($i=0;$i<count($dosen[1]);$i++){
			$dDosen=explode('">',$dosen[1][$i]);
			$hasil["dosen"][$i]=array(
				'program_studi_id'=>(int) $id,
				'nama'=>$dDosen[1],
				'url'=>$dDosen[0],
				'gelar'=>$dosen[2][$i],
				'pendidikan'=>$dosen[3][$i],
				'profil'=>"",
				'foto'=>"",
			);
		}
		return $hasil;
	}
    private function getDosen($url,$id){
		$hasil=array(
			"profil"=>"",
			"foto"=>"",
			"riwayat_pendidikan"=>array(),
			"riwayat_mengajar"=>array(),
			"riwayat_penelitian"=>array()
		);
		
		$data=file_get_contents($url);
		//profil
		preg_match("/<table class='table1'>(.*?)<\/table>/si", $data, $profil);
		//foto
		preg_match("/<img class='img-polaroid' src='(.*?)' \/>/si", $data, $foto);
		//pendidikan
		preg_match("/<div class='tab-pane' id='riwayatpendidikan'>.*?<table class='table table-bordered'>(.*?)<\/table>.*?<\/div>/si", $data, $riwayat_pendidikan);
		preg_match_all("/<tr class='tmiddle'>.*?<td class='tcenter'>.*?<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td class='tcenter'>(.*?)<\/td>.*?<\/tr>/si", $riwayat_pendidikan[1], $riwayat_pendidikan);
		//mengajar
		preg_match("/<div class='tab-pane' id='riwayatmengajar'>.*?<table class=\"table table-bordered\">(.*?)<\/table>.*?<\/div>/si", $data, $riwayat_mengajar);
		preg_match_all('/<tr class="tmiddle">.*?<td class="tcenter">.*?<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<\/tr>/si', $riwayat_mengajar[1], $riwayat_mengajar);
		//pendidikan
		preg_match("/<div class='tab-pane' id='penelitian'>.*?<table class='table table-bordered'>(.*?)<\/table>.*?<\/div>/si", $data, $riwayat_penelitian);
		preg_match_all('/<tr class="tmiddle">.*?<td class="tcenter">.*?<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<\/tr>/si', $riwayat_penelitian[1], $riwayat_penelitian);

		$hasil["profil"]=$profil[0];

		$hasil["foto"]=$foto[1];
		for($i=0;$i<count($riwayat_pendidikan[1]);$i++){
			$hasil["riwayat_pendidikan"][]=array(
				'dosen_id'=>$id,
				'perguruan_tinggi'=>$riwayat_pendidikan[1][$i],
				'gelar'=>$riwayat_pendidikan[2][$i],
				'tgl_ijazah'=>is_numeric($riwayat_pendidikan[3][$i])?$riwayat_pendidikan[3][$i]:0,
				'jenjang'=>$riwayat_pendidikan[4][$i]
			);
		}
		for($i=0;$i<count($riwayat_mengajar[1]);$i++){
			$hasil["riwayat_mengajar"][]=array(
				'dosen_id'=>$id,
				'semester'=>$riwayat_mengajar[1][$i],
				'kd_matkul'=>$riwayat_mengajar[2][$i],
				'nm_matkul'=>htmlspecialchars($riwayat_mengajar[3][$i]),
				'kd_kelas'=>$riwayat_mengajar[4][$i],
				'perguruan_tinggi'=>$riwayat_mengajar[5][$i]
			);
		}
		for($i=0;$i<count($riwayat_penelitian[1]);$i++){
			$hasil["riwayat_penelitian"][]=array(
				'dosen_id'=>$id,
				'judul'=>$riwayat_penelitian[1][$i],
				'bidang_ilmu'=>$riwayat_penelitian[2][$i],
				'lembaga'=>$riwayat_penelitian[3][$i],
				'tahun'=>$riwayat_penelitian[4][$i]
			);
		}
		return $hasil;
	}
}
