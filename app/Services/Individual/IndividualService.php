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
    public function getTotalPop($ward = []): int
    {
        $select_attr = [DB::raw('count(*) as total')];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->individualRepository->getWithHousehold($select_attr)->first()?->total;
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


    /**
     * Population Genderwise
     * 
     * @param $ward
     * 
     * 
     */
    public function getGenderWise($ward = [])
    {
        $select_attr = ['individual.gender',DB::raw('count(*) as total')];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = ['individual.gender'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }
}
