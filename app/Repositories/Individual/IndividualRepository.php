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
}
