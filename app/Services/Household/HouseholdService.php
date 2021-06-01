<?php

declare(strict_types=1);

namespace App\Services\Household;

use App\Repositories\Birthplace\BirthplaceRepository;
use App\Repositories\Disastor\DisastorRepository;
use App\Repositories\Facilities\FacilitiesRepository;
use App\Repositories\Household\HouseholdHomeRepository;
use App\Repositories\Household\HouseholdRepository;
use App\Repositories\WasteMgmt\WasteMgmtRepository;
use App\Repositories\WaterDistance\WaterDistanceRepository;
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
        public HouseholdHomeRepository $householdHomeRepository,
        public WaterDistanceRepository $waterDistanceRepository,
        public BirthplaceRepository $birthplaceRepository,
        public DisastorRepository $disastorRepository,
        public WasteMgmtRepository $wasteMgmtRepository
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

        return $this->facilitiesRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr);
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
        return $this->countBySingleColumnHousehold('house_ownership', $ward);
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
        return $this->countBySingleColumnHousehold('roofing', $ward);
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
        return $this->countBySingleColumnHousehold('foundation', $ward);
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
        $data = $this->countBySingleColumnHousehold('has_house_number', $ward);
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
        return $this->countBySingleColumnHousehold('type_of_access_to_road', $ward);
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
        $data = $this->countBySingleColumnHousehold('type_of_road', $ward);

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
        return $this->countBySingleColumnHome('ward', $ward);
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
        $final['xAxis'] = [];
        $final["total_rooms"] = [];
        $final["rented_rooms"] = [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('ward');

        foreach ($data as $v) {
            $final["xAxis"][] = $v['ward'];
            $final["total_rooms"][] = $v['total_rooms'];
            $final["rented_rooms"][] = $v['rented_rooms'];
        }

        return $final;
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
        $data = $this->countBySingleColumnHome('naksa_pass', $ward);
        return booleanDataFormat($data);
    }

    /**
     * Return data for water source
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getWaterSourceData($ward = []): array
    {
        return $this->countBySingleColumnHousehold('drinking_water', $ward);
    }

    /**
     * Return data for main cooking fuel source
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getFuelSourceData($ward = []): array
    {
        return $this->countBySingleColumnHousehold('cooking_fuel', $ward);
    }

    /**
     * Return data for main electricity source
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getElectricitySourceData($ward = []): array
    {
        return $this->countBySingleColumnHousehold('main_electricity_source', $ward);
    }

    /**
     * Return data for distance basic healthcare
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getDistanceHealthData($ward = []): array
    {
        $data = $this->countBySingleColumnHousehold('distance_to_basic_healthcare', $ward);

        return array_map(function ($v) {

            if (is_null($v['category'])) {
                return [
                    'category' => 'N/A',
                    'total' => $v['total']
                ];
            }

            return $v;
        }, $data);
    }

    /**
     * Return data for alternate energy source
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getAlternateEnergyData($ward = []): array
    {
        $data = $this->countBySingleColumnHousehold('alternative_electricity_source', $ward);

        return array_map(function ($v) {

            if (is_null($v['category'])) {
                return [
                    'category' => 'N/A',
                    'total' => $v['total']
                ];
            }

            return $v;
        }, $data);
    }

    /**
     * Return data for earthquake resistant
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getEarthquakeResistantData($ward = []): array
    {
        $data = $this->countBySingleColumnHousehold('is_earthquake_resistant', $ward);
        return booleanDataFormat($data);
    }

    /**
     * Return data for risk mitigation
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getRiskMitigationData($ward = []): array
    {
        $data = $this->countBySingleColumnHousehold('has_risk_mitigation_plans', $ward);
        return booleanDataFormat($data);
    }

    /**
     * Return data for toilet type
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getToiletTypeData($ward = []): array
    {
        return $this->countBySingleColumnHousehold('toilet_facility', $ward);
    }

    /**
     * Return data for toilet availability
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getToiletData($ward = []): array
    {
        $tmp = [
            'yes' => 0,
            'no' => 0
        ];
        $data = $this->countBySingleColumnHousehold('toilet_facility', $ward);
        
        foreach($data as $v){
            if($v['category'] == "शौचालय नभएको"){
                $tmp['no'] += (int) $v['total'];
                continue;
            }

            $tmp['yes'] += (int) $v['total'];
        }
        

        return array_map(function($v, $k){
            return [
                'category' => $k,
                'total' => $v
            ];
        }, $tmp, array_keys($tmp));
    }

    /**
     * Return data water distance data
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getDistanceWaterData($ward = []): array
    {
        $select_attr = ['water_distance.name_np as category',DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['water_distance.name_np'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->waterDistanceRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Return data birthplace
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getBirthplaceData($ward = []): array
    {
        $select_attr = ['birthplace.name_np as category',DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['birthplace.name_np'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->birthplaceRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Return data for househol vulnerabilities
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getVulnerabilityData($ward = []): array
    {
        $select_attr = ['disastor.name_np as category',DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['disastor.name_np'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->disastorRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Return data for household facilities
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getFacilitiesData($ward = []): array
    {
        $select_attr = ['facilities.name_np as category',DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['facilities.name_np'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->facilitiesRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Return data for household waste mgmt data
     * 
     * @param $ward
     * 
     * @return array
     */
    public function getWasteMgmtData($ward = []): array
    {
        $select_attr = ['waste_mgmt.name_np as category',DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['waste_mgmt.name_np'];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->wasteMgmtRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Query for single source of data for Household model;
     * 
     * @param $column
     * @param $ward
     * 
     * @return array
     */
    private function countBySingleColumnHousehold($column, $ward = []): array
    {
        $select_attr   = ["$column as category", DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = [$column];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }

    /**
     * Query for single source of data for HouseholdHome model;
     * 
     * @param $column
     * @param $ward
     * 
     * @return array
     */
    private function countBySingleColumnHome($column, $ward = []): array
    {
        $select_attr   = ["$column as category", DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = [$column];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
    }
}
