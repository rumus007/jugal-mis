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
        // \App\Models\User::factory(10)->create();
        $this->call(ResourceTypeSeeder::class);
        $this->call(FacilityTypeSeeder::class);
        $this->call(WasteMgmtTypeSeeder::class);
        $this->call(NewbornBirthplaceTypeSeeder::class);
        $this->call(DisastorTypeSeeder::class);
        $this->call(WaterDistanceSeeder::class);
        $this->call(IncomeSourceSeeder::class);
    }
}
