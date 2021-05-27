<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = DBTables::HOUSEHOLD;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        'index',
        'province',
        'district',
        'locallevel',
        'locallevel_code',
        'ward',
        'tole',
        'tole_misc',      
        'street_name',
        'has_house_number',
        'house_number',
        'type_of_access_to_road',
        'type_of_road',
        'house_ownership',
        'roofing',
        'roofing_misc',
        'foundation',
        'foundation_misc',
        'geo_code',
        'geo_latitude',
        'geo_longitude',
        'geo_altitude',
        'geo_precision',
        'photo',
    ];
}
