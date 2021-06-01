<?php

declare(strict_types=1);

namespace App\Repositories\Birthplace;

use App\Models\Household\Birthplace;
use App\Repositories\Repository;

/**
 * Class BirthplaceRepository
 *
 * @package App\Repositories\Birthplace
 */
class BirthplaceRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Birthplace::class;
    }

    /**
     * Get new born birthplace data
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
                'household_birthplace',
                'household_birthplace.birthplace_id',
                '=',
                'birthplace.id'
            )
            ->join(
                'household',
                'household.id',
                '=',
                'household_birthplace.household_id'
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