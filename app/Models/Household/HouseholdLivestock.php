<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdLivestock extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::HOUSEHOLD_LIVESTOCK;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        "household_id",
        "livestock_id",
        "number_of_livestock",
        "milk_production_ltr",
        "meat_production_kg",
        "wool_production_kg",
        "bone_skin_production_kg",
        "egg_production_kg",
        "total_revenue",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class,'livestock_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class,'household_id','id');
    }
}
