<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resource_type')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'business_trade',
                    'name_np'    => 'व्यापार तथा व्यवसाय (किराना, मासु, कपडा)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 2,
                    'name'       => 'natural_resource',
                    'name_np'    => 'प्राकृतिक श्रोत (पोखरी, झरना, खानी, गुफा, कुण्ड, कुवा, पधेरो)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 3,
                    'name'       => 'land_use',
                    'name_np'    => 'भू-उपयोगको स्थिति (कृषि, चरन, वन, सार्वजनिक, औधोगिक, संवेदनशील)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 4,
                    'name'       => 'ngo_club_group',
                    'name_np'    => 'गैसस/क्लब/समूह',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 5,
                    'name'       => 'bridge_culvert',
                    'name_np'    => 'पुल तथा पुलेसा',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 6,
                    'name'       => 'cultural_heritage',
                    'name_np'    => 'संस्कृतिक सम्पदा (मठ मन्दिर, धर्मशाला, संग्रालय, दरवार)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 7,
                    'name'       => 'industry_hydro',
                    'name_np'    => 'उद्योग तथा कलकारखाना/जलविद्युत',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 8,
                    'name'       => 'educational_institute',
                    'name_np'    => 'शैक्षिक संस्था',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 9,
                    'name'       => 'health_institute',
                    'name_np'    => 'स्वास्थ्य संस्था',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 10,
                    'name'       => 'hotel_resort_homestay',
                    'name_np'    => 'होटल/रिसोर्ट/होमस्टे',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 11,
                    'name'       => 'bank_financial',
                    'name_np'    => 'बैंक तथा वित्तिय संस्था',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 12,
                    'name'       => 'security_agency',
                    'name_np'    => 'सुरक्षा निकाय',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ],
                [
                    'id'         => 13,
                    'name'       => 'building',
                    'name_np'    => 'भवन (सरकारी, सभागृह, समुदायिक, सहकारी)',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ]
            ]
        );
    }
}
