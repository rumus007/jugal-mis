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
    public function getTotalPop($params): int
    {
        $select_attr = [DB::raw('count(*) as total')];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = [];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->first()?->total;
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
     * @param $params
     * 
     * @return array
     */
    public function getGenderWise($params): array
    {
        return $this->getSingleColumnData('gender', $params);
    }

    /**
     * Population ethinicity-wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getEthnicityData($params): array
    {
        return $this->getSingleColumnData('caste', $params);
    }

    /**
     * Population religion-wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getReligionData($params): array
    {
        return $this->getSingleColumnData('religion', $params);
    }

    /**
     * Population mother tongue-wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getMotherTongueData($params): array
    {
        return $this->getSingleColumnData('mother_tongue', $params);
    }

    /**
     * Population martial status-wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getMaritalStatusData($params): array
    {
        $data = $this->getSingleColumnData('martial_status', $params);

        return array_map(function ($val) {
            if (is_null($val['category']) || $val['category'] == '') {
                return [
                    'category' => 'N/A',
                    'total' => $val['total']
                ];
            }

            return $val;
        }, $data);
    }

    /**
     * Population domicile status-wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDomicileStatusData($params): array
    {
        return $this->getSingleColumnData('domicile_status', $params);
    }

    /**
     * Population education level data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getEducationData($params): array
    {
        return $this->getSingleColumnData('education_level', $params);
    }

    /**
     * Retrive count information grouped by single column
     * 
     * @param $column
     * @param $params
     * 
     * @return array
     */
    private function getSingleColumnData($column, $params): array
    {
        $select_attr = ["individual.$column as category", DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ["individual.$column"];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }
}
