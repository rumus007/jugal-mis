<?php

declare(strict_types=1);

namespace App\Repositories\WaterDistance;

use App\Models\Household\WaterDistance;
use App\Repositories\Repository;

/**
 * Class WaterDistanceRepository
 *
 * @package App\Repositories\WaterDistance
 */
class WaterDistanceRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return WaterDistance::class;
    }

    /**
     * Get water disatance data
     * 
     * @param $select_attr
     * @param $where_attr
     * @param $where_in_attr
     * @param $group_by_attr
     */
    public function getWithHousehold($select_attr = '*', $where_attr = [], $where_in_attr = [], $group_by_attr = [])
    {
        $toReturn = $this->model
            ->select($select_attr)
            ->join(
                'household_water_distance',
                'household_water_distance.water_distance_id',
                '=',
                'water_distance.id'
            )
            ->join(
                'household',
                'household.id',
                '=',
                'household_water_distance.household_id'
            );

        if ($where_attr) {
            $toReturn->where($where_attr);
        }

        if ($where_in_attr) {
            foreach ($where_in_attr as $val) {
                $toReturn->whereIn(...$val);
            }
        }

        if ($group_by_attr) {
            $toReturn->groupBy(...$group_by_attr);
        }

        return $toReturn->get();
    }
}
