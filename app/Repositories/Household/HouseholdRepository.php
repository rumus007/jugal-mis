<?php

declare(strict_types=1);

namespace App\Repositories\Household;

use App\Models\Household\Household;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

/**
 * Class HouseholdRepository
 *
 * @package App\Repositories\Household
 */
class HouseholdRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Household::class;
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
    public function getHouseholdData($select_attr = '*', $where_attr = [], $where_in_attr = [], $group_by_attr = [])
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

    /**
     * Returns household count
     * 
     * @param $where_attr
     * 
     * @return int
     */
    public function getHouseholdCount($where_attr = []): int
    {
        return $this->model->where($where_attr)->count();
    }
}
