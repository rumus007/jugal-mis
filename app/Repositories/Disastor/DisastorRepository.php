<?php

declare(strict_types=1);

namespace App\Repositories\Disastor;

use App\Models\Household\Disastor;
use App\Repositories\Repository;

/**
 * Class DisastorRepository
 *
 * @package App\Repositories\Disastor
 */
class DisastorRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Disastor::class;
    }

    /**
     * Get new born disastor data
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
                'household_disastor',
                'household_disastor.disastor_id',
                '=',
                'disastor.id'
            )
            ->join(
                'household',
                'household.id',
                '=',
                'household_disastor.household_id'
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