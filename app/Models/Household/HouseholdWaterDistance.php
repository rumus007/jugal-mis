<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdWaterDistance extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::HOUSEHOLD_WATER_DISTANCE;
}