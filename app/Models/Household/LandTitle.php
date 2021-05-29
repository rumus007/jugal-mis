<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandTitle extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::LAND_TITLE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function household()
    {
        return $this->belongsToMany(Household::class, DBTables::HOUSEHOLD_LAND_TITLE);
    }
}
