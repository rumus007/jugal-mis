<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriProduct extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::AGRI_PRODUCT;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function household()
    {
        return $this->belongsToMany(Household::class, DBTables::HOUSEHOLD_AGRI_PRODUCT);
    }
}
