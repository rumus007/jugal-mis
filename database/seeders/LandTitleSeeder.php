<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('land_title')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'own_family_male',
                    'name_np'    => 'आफ्नो परिवारको (पुरुष)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'own_family_female',
                    'name_np'    => 'आफ्नो परिवारको (महिला)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'own_family_joint',
                    'name_np'    => 'आफ्नो परिवारको (संयुक्त)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'own_family_third_gender',
                    'name_np'    => 'आफ्नो परिवारको (तेश्रो लिङ्गी)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 5,
                    'name'       => 'not_owned_by_family',
                    'name_np'    => 'परिवार बाहेक अरुको',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 6,
                    'name'       => 'other',
                    'name_np'    => 'अन्य',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ]
            ]
        );
    }
}
