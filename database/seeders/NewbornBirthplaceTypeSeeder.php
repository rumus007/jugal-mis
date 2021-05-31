<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewbornBirthplaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('birthplace')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'house',
                    'name_np'    => 'घर',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'health_post',
                    'name_np'    => 'स्वास्थ्य चाैकी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'hospital',
                    'name_np'    => 'अस्पताल',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'other',
                    'name_np'    => 'अन्य',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
