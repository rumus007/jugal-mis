<?php

namespace App\Models\Resource;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = DBTables::RESOURCE;

    /**
     * The fields that can be mass assigned
     *
     * @var string[]
     */
    protected $fillable = [
        'resource_type_id',
        'province',
        'district',
        'locallevel',
        'locallevel_code',
        'ward',
        'tole',
        'tole_misc',
        'address',
        'local_name',
        'contact_number',
        'website',
        'geo_code',
        'geo_latitude',
        'geo_longitude',
        'geo_altitude',
        'geo_precision',
        'photo',
        'metadata',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource_type()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id', ' id');
    }
}
