<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ResourceTypeSeeder::class);
        $this->call(FacilityTypeSeeder::class);
        $this->call(WasteMgmtTypeSeeder::class);
        $this->call(NewbornBirthplaceTypeSeeder::class);
        $this->call(DisastorTypeSeeder::class);
        $this->call(WaterDistanceSeeder::class);
        $this->call(IncomeSourceSeeder::class);
        $this->call(LandTitleSeeder::class);
        $this->call(AgriProductSeeder::class);
        $this->call(LivestockSeeder::class);
    }
}
