<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisastorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disastor')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'earthquake',
                    'name_np'    => 'भूकम्प',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'flood',
                    'name_np'    => 'बाढी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'lightning',
                    'name_np'    => 'चट्याङ्ग',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'strong_winds',
                    'name_np'    => 'हावाहुरी',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 5,
                    'name'       => 'cold_wave',
                    'name_np'    => 'शितलहर',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 6,
                    'name'       => 'duban_katan',
                    'name_np'    => 'डुवान वा कटान',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
            ]
        );
    }
}
