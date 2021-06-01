<?php

declare(strict_types=1);

namespace App\Services\Household;

use App\Repositories\Facilities\FacilitiesRepository;
use App\Repositories\Household\HouseholdHomeRepository;
use App\Repositories\Household\HouseholdRepository;
use App\Repositories\Individual\IndividualRepository;
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
        public FacilitiesRepository $facilitiesRepository,
        public HouseholdHomeRepository $householdHomeRepository
    ) {
    }

    /**
     * Get total household count
     * 
     * @param $ward
     * 
     * @return int
     */
    public function getTotalHouseholdCount($ward = []): int
    {
        $where_attr = [];
        $where_in_attr = [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getHouseholdCount($where_attr, $where_in_attr);
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

        if ($facilites) {
            $where_in_attr[] = ['facilities.name', $facilites];
        }

        if ($ward) {
            $where_in_attr[] = ['household.ward', $ward];
        }

        return $this->facilitiesRepository->getFacilitiesCount($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
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

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
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

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
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

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
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
        $select_attr   = ['has_house_number as category', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['has_house_number'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
        return booleanDataFormat($data);
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

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
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

        return array_map(function ($val) {
            $val['category'] = $val['category'] ? $val['category'] : 'N/A';
            return $val;
        }, $data);

    }


    /**
     * Return data for ward wise houses
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getHouseCount($ward = []): array
    {
        $select_attr = ['ward as category', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['ward'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }


    /**
     * Return data for ward wise room data
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getRoomData($ward = []): array
    {
        $select_attr = ['ward', DB::raw('SUM(cast(no_of_rooms as INT)) as total_rooms, SUM(cast(no_of_rented_rooms as INT)) as rented_rooms')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['ward'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Return data for house listed (naksa pass)
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getHouseListedData($ward = []): array
    {
        $select_attr = ['naksa_pass as category', DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = ['naksa_pass'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
        return booleanDataFormat($data);
    }
}
