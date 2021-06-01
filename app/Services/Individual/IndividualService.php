<?php

declare(strict_types=1);

namespace App\Services\Individual;

use App\Repositories\Individual\IndividualRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class IndividualService
 *
 * @package App\Services\Individual
 */
class IndividualService
{
    /**
     * IndividualService Constructor
     */
    public function __construct(
        public IndividualRepository $individualRepository
    ) {
    }

    /**
     * Get total population count
     * 
     * @return int
     */
    public function getTotalPopulation(): int
    {
        return $this->individualRepository->getIndividualCount();
    }

    /**
     * Get total population count
     * 
     * @return int
     */
    public function getYouthPopulation(): int
    {
        $where_attr = [['age', '>=', '16'], ['age', '<=', '50']];
        return $this->individualRepository->getIndividualCount($where_attr);
    }

    /**
     * Get total employed count
     * 
     * @return int
     */
    public function getEmployedPopulation(): int
    {
        $where_attr = DB::raw("NOT employment_status IN ('वेरोजगार')");
        return $this->individualRepository->getIndividualCount($where_attr);
    }
}
