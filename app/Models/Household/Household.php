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
        'id',
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
        'house_count',
        'type_of_access_to_road',
        'type_of_road',
        'house_ownership',
        'roofing',
        'roofing_misc',
        'foundation',
        'foundation_misc',
        "family_head_name",
        "family_head_gender",
        "family_head_age",
        "no_of_rooms",
        "no_of_rented_rooms",
        "drinking_water",
        "drinking_water_misc",
        "cooking_fuel",
        "cooking_fuel_misc",
        "main_electricity_source",
        "alternative_electricity_source",
        "distance_to_basic_healthcare",
        "is_earthquake_resistant",
        "has_risk_mitigation_plans",
        "vulnerable_to_national_disaster",
        "toilet_facility",
        "family_member_count",
        "is_income_enough",
        "avg_family_income",
        "avg_family_expenditure",
        "avg_family_saving",
        "subsistence_of_income",
        "has_bank_account",
        "use_of_family_lang_agriculture",
        "livestock",
        "fish_honeybee_silkworm",
        'geo_code',
        'geo_latitude',
        'geo_longitude',
        'geo_altitude',
        'geo_precision',
        'photo',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdFacilities()
    {
        return $this->belongsToMany(Facilities::class, DBTables::HOUSEHOLD_FACILITIES);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdWasteMgmt()
    {
        return $this->belongsToMany(WasteMgmt::class, DBTables::HOUSEHOLD_WASTE_MGMT);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdBirthplace()
    {
        return $this->belongsToMany(Birthplace::class, DBTables::HOUSEHOLD_BIRTHPLACE);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdDisastor()
    {
        return $this->belongsToMany(Disastor::class, DBTables::HOUSEHOLD_DISASTOR);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdWaterDistance()
    {
        return $this->belongsToMany(WaterDistance::class, DBTables::HOUSEHOLD_WATER_DISTANCE);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdIncomeSrc()
    {
        return $this->belongsToMany(IncomeSrc::class, DBTables::HOUSEHOLD_INCOME_SRC);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdLandTitle()
    {
        return $this->belongsToMany(LandTitle::class, DBTables::HOUSEHOLD_LAND_TITLE);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function householdAgriProduct()
    {
        return $this->belongsToMany(AgriProduct::class, DBTables::HOUSEHOLD_AGRI_PRODUCT);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function HouseholdLivestock()
    {
        return $this->hasMany(HouseholdLivestock::class,'livestock_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function HouseholdFishBeeSilkworm()
    {
        return $this->hasMany(HouseholdFishBeeSilkworm::class,'livestock_id','id');
    }
}
