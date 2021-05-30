<?php

namespace App\Console\Commands;

use App\Imports\HouseheadImport;
use App\Imports\IndividualImport;
use App\Models\Household\Household;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportIndividual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:individual';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data related to individual';

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

        $this->info("Importing family members data");
        $excel_path = public_path('files/individual.csv');
        Excel::import(new IndividualImport, $excel_path);

        $this->info("Importing family head data");
        $excel_path = public_path('files/family_head.csv');
        Excel::import(new HouseheadImport, $excel_path);
        $this->info("Data import complete");
    }
}
