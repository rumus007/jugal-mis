<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::VACCINE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function household()
    {
        return $this->belongsToMany(Household::class, DBTables::HOUSEHOLD_VACCINE);
    }
}
