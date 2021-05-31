<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdFishBeeSilkworm extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::HOUSEHOLD_BEE_FISH_SILKWORM;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        "household_id",
        "livestock_id",
        "total_fish_ponds",
        "area_fish_pond",
        "area_fish_pond_unit",
        "fish_production_kg",
        "total_honeybee_home",
        "honey_production_kg",
        "total_silkworm_koyo",
        "silk_production_kg",
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
