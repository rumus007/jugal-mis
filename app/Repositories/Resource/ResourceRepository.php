<?php

declare(strict_types=1);

namespace App\Repositories\Resource;

use App\Models\Resource\Resource;
use App\Repositories\Repository;

/**
 * Class ResourceRepository
 *
 * @package App\Repositories\Resource
 */
class ResourceRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Resource::class;
    }

    /**
     * Returns resource with resource type
     * 
     * @param $selec_attr
     * @param $where_attr
     * @param $where_in_attr
     * @param $group_by_attr
     * 
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getWithResourceType($select_attr = '*', $where_attr = [], $where_in_attr = [], $group_by_attr = [])
    {
        $data = $this->model
            ->join('resource_type', 'resource_type.id', '=', 'resource.resource_type_id')
            ->select($select_attr);

        if ($where_attr) {
            $data->where($where_attr);
        }

        if ($where_in_attr) {
            foreach ($where_in_attr as $val) {
                $data->whereIn(...$val);
            }
        }

        if ($group_by_attr) {
            $data->groupBy($group_by_attr);
        }

        return $data->get();
    }
}
