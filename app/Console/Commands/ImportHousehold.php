<?php

namespace App\Console\Commands;

use App\Imports\HouseholdImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportHousehold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:household';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all household data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Importing household data");
        set_time_limit(0);
        $excel_path = public_path('files/ghar_dhuri.csv');
        Excel::import(new HouseholdImport, $excel_path); 
        $this->info("Data import complete");
    }
}
