<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'radio',
                    'name_np'    => 'रेडियो',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'television',
                    'name_np'    => 'टेलिभिजन',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'mobile_telephone',
                    'name_np'    => 'टेलिफोन/मोवाइल फोन',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'computer',
                    'name_np'    => 'कम्प्युटर',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 5,
                    'name'       => 'internet',
                    'name_np'    => 'इन्टरनेट',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 6,
                    'name'       => 'motorcycle',
                    'name_np'    => 'मोटरसाइकल',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 7,
                    'name'       => 'motor_car',
                    'name_np'    => 'मोटर/कार',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 8,
                    'name'       => 'refrigerator',
                    'name_np'    => 'रेफ्रिजरेटर',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 9,
                    'name'       => 'none',
                    'name_np'    => 'कुनै पनि छैन',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
