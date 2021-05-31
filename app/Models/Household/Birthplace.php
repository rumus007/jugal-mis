<?php

namespace App\Models\Household;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birthplace extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::BIRTHPLACE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function household()
    {
        return $this->belongsToMany(Household::class, DBTables::HOUSEHOLD_BIRTHPLACE);
    }
}
