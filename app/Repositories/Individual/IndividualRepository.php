<?php

declare(strict_types=1);

namespace App\Repositories\Individual;

use App\Models\Individual\Individual;
use App\Repositories\Repository;

class IndividualRepository extends Repository
{
    /**
     * Returns model
     *
     * @return String
     */
    function getModel(): string
    {
        return Individual::class;
    }

    /**
     * Returns individual count
     * 
     * @param $where_attr
     * 
     * @return int
     */
    public function getIndividualCount($where_attr = []): int
    {
        return $this->model->where($where_attr)->count();
    }

    /**
     * Returns individual data with household data
     * 
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getWithHousehold($select_attr = '*', $where_attr = [], $where_in_attr = [], $group_by_attr = [])
    {
        $data = $this->model
            ->join('household', 'household.id', '=', 'individual.household_id')
            ->select($select_attr);

        if ($where_attr) {
            foreach ($where_attr as $val) {
                $data->where(...$val);
            }
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
