<?php

namespace App\Models\Resource;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::RESOURCE_TYPE;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'name_np'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource()
    {
        return $this->hasOne(Resource::class,'resource_type_id','id');
    }
}
