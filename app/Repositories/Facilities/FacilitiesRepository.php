<?php

declare(strict_types=1);

namespace App\Repositories\Facilities;

use App\Models\Household\Facilities;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

/**
 * Class FacilitiesRepository
 *
 * @package App\Repositories\Facilities
 */
class FacilitiesRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Facilities::class;
    }

    /**
     * Get facilities data
     * 
     * @param $select_attr
     * @param $where_attr
     * @param $where_in_attr
     * @param $group_by_attr
     */
    public function getFacilitiesCount($select_attr = '*', $where_attr = [], $where_in_attr = [], $group_by_attr = [])
    {
        $toReturn = $this->model
            ->select($select_attr)
            ->join(
                'household_facilities',
                'household_facilities.facilities_id',
                '=',
                'facilities.id'
            )
            ->join(
                'household',
                'household.id',
                '=',
                'household_facilities.household_id'
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
