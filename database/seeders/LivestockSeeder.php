<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivestockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livestock')->insert([
            [
                'id'         => 1,
                'name'       => 'cow',
                'name_np'    => 'गाइगोरु/बाच्छाबाच्छी',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 2,
                'name'       => 'buffalo',
                'name_np'    => 'राँगाभैसी/पाडापाडी',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 3,
                'name'       => 'yak',
                'name_np'    => 'याक/चौरी',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 4,
                'name'       => 'goat',
                'name_np'    => 'बाख्रा/खसी/बोका/च्याग्रा',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 5,
                'name'       => 'sheep',
                'name_np'    => 'भेडा',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 6,
                'name'       => 'rabbit',
                'name_np'    => 'खरायो',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 7,
                'name'       => 'duck_chicken',
                'name_np'    => 'कुखुरा/हाँस',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 8,
                'name'       => 'pig',
                'name_np'    => 'सुँगुर/वंगुर',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 9,
                'name'       => 'horse_mule',
                'name_np'    => 'घोडा/खच्चड',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 10,
                'name'       => 'fish',
                'name_np'    => 'माछा',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 11,
                'name'       => 'honeybee',
                'name_np'    => 'मौरी',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'         => 13,
                'name'       => 'silkworm',
                'name_np'    => 'रेशम',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
