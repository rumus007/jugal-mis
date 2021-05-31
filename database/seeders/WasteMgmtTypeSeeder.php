<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteMgmtTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waste_mgmt')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'no_waste_mgmt',
                    'name_np'    => 'फोहर व्यवस्थापनका लागि केहि पनि गरेको छैन',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'pit_without_classification',
                    'name_np'    => 'वर्गीकरण नगरी खाल्डोमा राखी व्यवस्थापन गरेको',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'separate_pit_with_classification',
                    'name_np'    => 'वर्गीकरण गरी अलग अलग खाल्डोमा राखी व्यवस्थापन गरेको',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'garbage_collection_org',
                    'name_np'    => 'फोहर संकलन संस्थाले व्यवस्थापन गरेको',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
