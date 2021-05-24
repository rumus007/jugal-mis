<?php

namespace App\Console\Commands;

use App\Imports\ResourceImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the resource data from excel file';

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
        $this->info("Importing resource data");
        $excel_path = storage_path('app/public/resource.xlsx');
        Excel::import(new ResourceImport, $excel_path);
        $this->info("Data import complete");
    }
}
