<?php

declare(strict_types=1);

namespace App\Repositories\Household;

use App\Models\Household\HouseholdHome;
use App\Repositories\Repository;

/**
 * Class HouseholdHomeRepository
 *
 * @package App\Repositories\Household
 */
class HouseholdHomeRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return HouseholdHome::class;
    }


    /**
     * Returns household home data
     * 
     * @param $selec_attr
     * @param $where_attr
     * @param $where_in_attr
     * @param $group_by_attr
     * 
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    function getHouseholdHome($select_attr = '*',$where_attr = [], $where_in_attr = [], $group_by_attr = [])
    {
        $data = $this->model->select($select_attr);

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
