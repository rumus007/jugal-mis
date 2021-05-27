<?php

declare(strict_types=1);

namespace App\Services\Household;

use App\Repositories\Household\HouseholdRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class HouseholdService
 *
 * @package App\Services\Household
 */
class HouseholdService
{
    /**
     * HouseholdService Constructor
     * 
     * @param HouseholdRepository $householdRepository
     */
    public function __construct(
        public HouseholdRepository $householdRepository
    ) {
    }

    /**
     * Return data for household ownership
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getHouseOwnershipData($ward = []): array
    {
        $select_attr   = ['house_ownership', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['house_ownership'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr);

        return prepareResponseFormat($data);
    }

    /**
     * Return data for household roofing
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getRoofingData($ward = []): array
    {
        $select_attr   = ['roofing', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['roofing'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr);

        return prepareResponseFormat($data);
    }

    /**
     * Return data for household foundation
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getFoundationData($ward = []): array
    {
        $select_attr   = ['foundation', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['foundation'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr);

        return prepareResponseFormat($data);
    }

    /**
     * Return data for house number
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getHouseNumberData($ward = []): array
    {
        $format = [
            'yes' => 0,
            'no' => 0,
        ];

        $select_attr   = ['has_house_number', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['has_house_number'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        foreach ($data as $v) {
            if ($v['has_house_number']) {
                $format['yes'] = $v['total'];
                continue;
            }

            $format['no'] = $v['total'];
        }

        $final = array_map(function ($val, $key) {
            return [
                "has_house_number" => $key,
                "total" => $val
            ];
        }, $format, array_keys($format));

        return prepareResponseFormat($final);
    }

    /**
     * Return data for road type to household data
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getRoadToHouseData($ward = []): array
    {
        $select_attr   = ['type_of_access_to_road as road_type', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['type_of_access_to_road'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr);

        return prepareResponseFormat($data);
    }

    /**
     * Return data for road type data
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getRoadTypeData($ward = []): array
    {
        $select_attr   = ['type_of_road', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['type_of_road'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        $final = array_map(function($val){
            $val['type_of_road'] = $val['type_of_road'] ? $val['type_of_road'] : 'N/A';
            return $val;
        }, $data);

        return prepareResponseFormat($final);
    }
}
