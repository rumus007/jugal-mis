<?php

namespace App\Console\Commands;

use App\Imports\HomeImport;
use App\Models\Household\Household;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportHome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:home';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all data related to homes of household';

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
     * @return void
     */
    public function handle()
    {
        set_time_limit(0);

        if (Household::count() == 0) {
            $this->warn("Please import household data before importing the home data");
            return;
        }

        $this->info("Importing home data");
        $excel_path = public_path('files/household_home.csv');
        Excel::import(new HomeImport, $excel_path);
        $this->info("Data import complete");
    }
}
