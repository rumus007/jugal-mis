<?php

namespace App\Console\Commands;

use App\Imports\HouseholdVaccineImport;
use App\Models\Household\Household;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportVaccination extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:vaccine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data related to vaccination';

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
        set_time_limit(0);
        if (Household::count() == 0) {
            $this->warn("Please import household data before importing the family members");
            return;
        }

        $this->info("Importing household vaccine data");
        $excel_path = public_path('files/vaccination.csv');
        Excel::import(new HouseholdVaccineImport(), $excel_path);
        $this->info("Data import complete");
    }
}
