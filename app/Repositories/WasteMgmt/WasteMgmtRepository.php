<?php

declare(strict_types=1);

namespace App\Repositories\WasteMgmt;

use App\Models\Household\WasteMgmt;
use App\Repositories\Repository;

/**
 * Class WasteMgmtRepository
 *
 * @package App\Repositories\WasteMgmt
 */
class WasteMgmtRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return WasteMgmt::class;
    }

    /**
     * Get new born Waste Mgmt data
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
                'household_waste_mgmt',
                'household_waste_mgmt.waste_mgmt_id',
                '=',
                'waste_mgmt.id'
            )
            ->join(
                'household',
                'household.id',
                '=',
                'household_waste_mgmt.household_id'
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