<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WebConfig;
use App\Http\ScrapingForlap;
use App\Job;


class WebConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $konfigurasi['urlForlap']=WebConfig::find('urlForlap')->value;
        $konfigurasi['webKeyWords']=WebConfig::find('webKeyWords')->value;
        $konfigurasi['webName']=WebConfig::find('webName')->value;
        $konfigurasi['webSub']=WebConfig::find('webSub')->value;
        $statusimport=$this->cekstatus();
        return view('home',['konfigurasi' => $konfigurasi,'statusimport'=>$statusimport]);
    }
    private function cekstatus()
    {
        $data=Job::all();
        if (count($data) == 0) 
            return "false";
        else
            return "true";
    }


    public function saveData(Request $request)
    {
        $request->session()->flash('status', 'Penyimpanan Berhasil');

        WebConfig::find("webName")->update(["value"=>$request->webName]);
        WebConfig::find("webSub")->update(["value"=>$request->webSub]);
        WebConfig::find("webKeyWords")->update(["value"=>$request->webKeyWords]);
        WebConfig::find("urlForlap")->update(["value"=>$request->urlForlap]);
        return redirect('home');
    }
}
