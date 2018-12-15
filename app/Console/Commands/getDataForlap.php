<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class getDataForlap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getDataForlap {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Mengambil data perguruan tinggi di forlap.ristekdikti.go.id dengan teknik scraping\n  by: Ersa Azis Mansyur";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($url = 0)
    {
        parent::__construct();
		
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$this->line('Data UIN');
		$bar = $this->output->createProgressBar(2);
		$bar->start();
		for($i=0;$i<2;$i++) {
			$bar->advance();
			sleep(1);
		}

		$bar->finish();
	}
}
