<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccine')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'bcg',
                    'name_np'    => 'बिसिजी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'dpt',
                    'name_np'    => 'डिपिटी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'hepatitis_b',
                    'name_np'    => 'हेपाटाइटिस बी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'hepatitis_influenza',
                    'name_np'    => 'हेपाटाइटिस इन्फ्लुन्जा बी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 5,
                    'name'       => 'polio_oral',
                    'name_np'    => 'Polio मुखबाट',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 6,
                    'name'       => 'polio_syringe',
                    'name_np'    => 'Polio सुईबाट',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 7,
                    'name'       => 'lymphatic_filariasis',
                    'name_np'    => 'हातिपाइले सुई',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 8,
                    'name'       => 'tetanus',
                    'name_np'    => 'धनुस्टंकार',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 9,
                    'name'       => 'measle_rubella',
                    'name_np'    => 'दादुरा रूबेला सुई',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 10,
                    'name'       => 'pneumonia',
                    'name_np'    => 'निमोनिया खाेप',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
