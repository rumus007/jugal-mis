<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaterDistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('water_distance')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'less_than_five_mins',
                    'name_np'    => 'पाँच मिनेटभन्दा कम',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'less_than_ten_mins',
                    'name_np'    => 'दस मिनेटभन्दा कम',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'less_than_half_hour',
                    'name_np'    => 'आधा घण्टाभन्दा कम',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'more_than_half_hour',
                    'name_np'    => 'आधा घण्टाभन्दा बढी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
