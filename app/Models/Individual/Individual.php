<?php

namespace App\Models\Individual;

use App\Constants\DBTables;
use App\Models\Household\Household;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::INDIVIDUAL;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        "household_id",
        "full_name",
        "gender",
        "age",
        "age_group",
        "religion",
        "religion_other",
        "mother_tongue",
        "mother_tongue_other",
        "caste",
        "caste_other",
        "education_level",
        "domicile_status",
        "employment_status",
        "employment_other",
        "martial_status",
        "in_different_district",
        "location_district",
        "in_foreign_country",
        "foreign_country",
        "disability_status",
        "health_status",
        "relationship_to_family_head",
        "training_taken",
        "disability_identification",
        "trainings",
        "common_disease",
        "common_disease_other",
        "chronic_disease",
        "chronic_disease_other",
        "identifications",
        "mobile_no",
        "has_mobile",
        "telecom",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class, 'household_id', 'id');
    }


    /**
     * Returns individual count
     * 
     * @param $where_attr
     * 
     * @return int
     */
    public function getIndividualCount($where_attr): int
    {
        return $this->model->where($where_attr)->count();
    }
}
