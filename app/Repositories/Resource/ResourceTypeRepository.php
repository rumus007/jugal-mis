<?php

declare(strict_types=1);

namespace App\Repositories\Resource;

use App\Models\Resource\ResourceType;
use App\Repositories\Repository;

/**
 * Class ResourceTypeRepository
 *
 * @package App\Repositories\Resource
 */
class ResourceTypeRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return ResourceType::class;
    }

    /**
     * Get id by Nepali name of resource_type
     * 
     * @param $name
     * 
     * @return Integer|Null
     */
    public function getIdByNepaliName($name): int|null
    {
        return $this->model->where('name_np', trim($name))->first()?->id;
    }

    /**
     * Get id by name of resource_type
     * 
     * @param $name
     * 
     * @return Integer|Null
     */
    public function getIdByName($name): int|null
    {
        return $this->model->where('name', trim($name))->first()?->id;
    }
}
