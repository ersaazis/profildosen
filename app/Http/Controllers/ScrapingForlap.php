<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebConfig;

use App\Jobs\ScrapingtoDatabase;
use App\Job;
use Log;

class ScrapingForlap extends Controller
{
    public function index()
    {
        if($this->cekstatus() == "false"){
    		ScrapingtoDatabase::dispatch()->onQueue('scraping');
            session()->flash('status', 'Data akan diimport');
        }
        else 
            session()->flash('status', 'Data Sedang Diimport !!!');

        return redirect('home');
    }
    public function cekstatus()
    {
    	$data=Job::all();
    	if (count($data) == 0) 
    		return "false";
    	else
    		return "true";
   	}
 }
