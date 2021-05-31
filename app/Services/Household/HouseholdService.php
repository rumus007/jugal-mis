<?php

declare(strict_types=1);

namespace App\Services\Household;

use App\Repositories\Facilities\FacilitiesRepository;
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
        public HouseholdRepository $householdRepository,
        public FacilitiesRepository $facilitiesRepository
    ) {
    }

    /**
     * Get total household count
     * 
     * @return int
     */
    public function getTotalHouseholdCount(): int
    {
        return $this->householdRepository->getHouseholdCount();
    }


    /**
     * Get total household count
     * 
     * @param array $facilites    List of facilites
     * @param array $ward         List of ward
     * 
     * @return Collection
     */
    public function getFacilitiesCount($facilites = [], $ward = [])
    {
        $select_attr = ['facilities.name', DB::raw('count(*)')];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = ['facilities.name'];

        if($facilites){
            $where_in_attr[] = ['facilities.name',$facilites];
        }

        if($ward){
            $where_in_attr[] = ['household.ward', $ward];
        }

        return $this->facilitiesRepository->getFacilitiesCount($select_attr, $where_attr, $where_in_attr, $group_by_attr);
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
        $select_attr   = ['house_ownership as category', DB::raw('count(*) as total')];
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
        $select_attr   = ['roofing as category', DB::raw('count(*) as total')];
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
        $select_attr   = ['foundation  as category', DB::raw('count(*) as total')];
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

        $select_attr   = ['has_house_number as category', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['has_house_number'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        foreach ($data as $v) {
            if ($v['category']) {
                $format['yes'] = $v['total'];
                continue;
            }

            $format['no'] = $v['total'];
        }

        $final = array_map(function ($val, $key) {
            return [
                "category" => $key,
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
        $select_attr   = ['type_of_access_to_road as category', DB::raw('count(*) as total')];
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
        $select_attr   = ['type_of_road as category', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['type_of_road'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        $final = array_map(function ($val) {
            $val['category'] = $val['category'] ? $val['category'] : 'N/A';
            return $val;
        }, $data);

        return prepareResponseFormat($final);
    }
}
