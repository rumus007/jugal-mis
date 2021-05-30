<?php

namespace App\Console\Commands;

use App\Imports\HouseholdAgriImport;
use App\Imports\HouseholdImport;
use App\Imports\HouseholdLivestockImport;
use App\Models\Household\Household;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportHousehold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:household {--type=default}';

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
        $type = $this->option('type');
        set_time_limit(0);
        switch ($type) {
            case 'default':
                $this->info("Importing household data");
                $excel_path = public_path('files/ghar_dhuri.csv');
                Excel::import(new HouseholdImport, $excel_path);
                break;

            case 'agri':
                $this->info("Importing household agricultural products data");
                $excel_path = public_path('files/household_agri.csv');
                if(Household::count() == 0){
                    $this->warn("Please import household data before importing the agriculture data");
                    break;
                }
                Excel::import(new HouseholdAgriImport, $excel_path);
                break;
            case 'livestock':
                $this->info("Importing household livestock data");
                $excel_path = public_path('files/livestock.csv');
                if(Household::count() == 0){
                    $this->warn("Please import household data before importing the livestock data");
                    break;
                }
                Excel::import(new HouseholdLivestockImport, $excel_path);
                break;
        }
    
        $this->info("Data import complete");
    }
}
