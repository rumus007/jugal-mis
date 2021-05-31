<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdDisastor extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::HOUSEHOLD_DISASTOR;
}