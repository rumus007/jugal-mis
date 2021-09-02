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
use Illuminate\Support\Facades\Route;

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
     * @param $params
     * 
     * @return array
     */
    public function getHouseOwnershipData($params): array
    {
        return $this->countBySingleColumnHousehold('house_ownership', $params);
    }

    /**
     * Return data for household roofing
     * 
     * @param $params
     * 
     * @return array
     */
    public function getRoofingData($params): array
    {
        return $this->countBySingleColumnHousehold('roofing', $params);
    }

    /**
     * Return data for household foundation
     * 
     * @param $params
     * 
     * @return array
     */
    public function getFoundationData($params): array
    {
        return $this->countBySingleColumnHousehold('foundation', $params);
    }

    /**
     * Return data for house number
     * 
     * @param $params
     * 
     * @return array
     */
    public function getHouseNumberData($params): array
    {
        $data = $this->countBySingleColumnHousehold('has_house_number', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for road type to household data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getRoadToHouseData($params): array
    {
        return $this->countBySingleColumnHousehold('type_of_access_to_road', $params);
    }

    /**
     * Return data for road type data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getRoadTypeData($params): array
    {
        $data = $this->countBySingleColumnHousehold('type_of_road', $params);
        return nullDataFormat($data);
    }


    /**
     * Return data for ward wise houses
     * 
     * @param $params
     * 
     * @return array
     */
    public function getHouseCount($params): array
    {
        return $this->countBySingleColumnHome('ward', $params);
    }


    /**
     * Return data for ward wise room data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getRoomData($params): array
    {
        $ward = isset($params['ward']) ? explode(',', $params['ward']) : [];
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
     * @param $params
     * 
     * @return array
     */
    public function getHouseListedData($params): array
    {
        $data = $this->countBySingleColumnHome('naksa_pass', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for water source
     * 
     * @param $params
     * 
     * @return array
     */
    public function getWaterSourceData($params): array
    {
        return $this->countBySingleColumnHousehold('drinking_water', $params);
    }

    /**
     * Return data for main cooking fuel source
     * 
     * @param $params
     * 
     * @return array
     */
    public function getFuelSourceData($params): array
    {
        return $this->countBySingleColumnHousehold('cooking_fuel', $params);
    }

    /**
     * Return data for main electricity source
     * 
     * @param $params
     * 
     * @return array
     */
    public function getElectricitySourceData($params): array
    {
        return $this->countBySingleColumnHousehold('main_electricity_source', $params);
    }

    /**
     * Return data for distance basic healthcare
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDistanceHealthData($params): array
    {
        $map = [
            "एक घण्टा भन्दा बढी" => '>एक घण्टा',
            "एक घण्टा भन्दा कम" => '<एक घण्टा',
            "आधा घण्टा भन्दा कम" => '<आधा घण्टा'
        ];

        $data = $this->countBySingleColumnHousehold('distance_to_basic_healthcare', $params);
        $formatted = nullDataFormat($data);

        return array_map(function ($v) use ($map) {
            return [
                'category' => isset($map[$v['category']]) ? $map[$v['category']] : $v['category'],
                'total' => $v['total']
            ];
        }, $formatted);
    }

    /**
     * Return data for alternate energy source
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAlternateEnergyData($params): array
    {
        $data = $this->countBySingleColumnHousehold('alternative_electricity_source', $params);
        return nullDataFormat($data);
    }

    /**
     * Return data for earthquake resistant
     * 
     * @param $params
     * 
     * @return array
     */
    public function getEarthquakeResistantData($params): array
    {
        $data = $this->countBySingleColumnHousehold('is_earthquake_resistant', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for risk mitigation
     * 
     * @param $params
     * 
     * @return array
     */
    public function getRiskMitigationData($params): array
    {
        $data = $this->countBySingleColumnHousehold('has_risk_mitigation_plans', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for toilet type
     * 
     * @param $params
     * 
     * @return array
     */
    public function getToiletTypeData($params): array
    {
        return $this->countBySingleColumnHousehold('toilet_facility', $params);
    }

    /**
     * Return data for toilet availability
     * 
     * @param $params
     * 
     * @return array
     */
    public function getToiletData($params): array
    {
        $tmp = [
            'छ' => 0,
            'छैन' => 0
        ];
        $data = $this->countBySingleColumnHousehold('toilet_facility', $params);

        foreach ($data as $v) {
            if ($v['category'] == "शौचालय नभएको") {
                $tmp['छैन'] += (int) $v['total'];
                continue;
            }

            $tmp['छ'] += (int) $v['total'];
        }


        return array_map(function ($v, $k) {
            return [
                'category' => $k,
                'total' => $v
            ];
        }, $tmp, array_keys($tmp));
    }

    /**
     * Return data water distance data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDistanceWaterData($params): array
    {
        $map = [
            "आधा घण्टाभन्दा बढी" => ">आधा घण्टा",
            "आधा घण्टाभन्दा कम" => "<आधा घण्टा",
            "पाँच मिनेटभन्दा कम"  => "<पाँच मिनेट",
            "दस मिनेटभन्दा कम"  => "<दस मिनेट",
        ];
        $select_attr    = ['water_distance.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['water_distance.name_np'];
        $ward           = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->waterDistanceRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
        
        return array_map(function ($v) use ($map) {
            return [
                'category' => isset($map[$v['category']]) ? $map[$v['category']] : $v['category'],
                'total' => $v['total']
            ];
        }, $data);
    }

    /**
     * Return data birthplace
     * 
     * @param $params
     * 
     * @return array
     */
    public function getBirthplaceData($params): array
    {
        $select_attr    = ['birthplace.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['birthplace.name_np'];
        $ward           = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->birthplaceRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for househol vulnerabilities
     * 
     * @param $params
     * 
     * @return array
     */
    public function getVulnerabilityData($params): array
    {
        $select_attr    = ['disastor.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['disastor.name_np'];
        $ward           = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->disastorRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household facilities
     * 
     * @param $params
     * 
     * @return array
     */
    public function getFacilitiesData($params): array
    {
        $select_attr    = ['facilities.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['facilities.name_np'];
        $ward           = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->facilitiesRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household waste mgmt data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getWasteMgmtData($params): array
    {
        $select_attr    = ['waste_mgmt.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['waste_mgmt.name_np'];
        $ward           = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->wasteMgmtRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household income src
     * 
     * @param $params
     * 
     * @return array
     */
    public function getIncomeSource($params): array
    {
        $select_attr    = ['income_src.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['income_src.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getWithIncomeSourceData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household agriculture land title
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAgriLandTitleData($params): array
    {
        $select_attr    = ['land_title.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['land_title.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getWithLandTitleData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household agriculture products
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAgriProducts($params): array
    {
        $select_attr    = ['agri_product.name as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['agri_product.name'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getWithAgriProductsData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }


    /**
     * Return data for household livestocks
     * 
     * @param $params
     * 
     * @return array
     */
    public function getLivestockData($params): array
    {
        $select_attr    = ['livestock.name_np as category', DB::raw('count(*) as total')];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['livestock.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getWithLivestockData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Return data for household fish, honey, silk production data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getFishHoneySilkData($params): array
    {

        $select_attr = [
            'livestock.name_np as category',
            DB::raw('sum(cast(household_bee_fish_silkworm.fish_production_kg as INT)) as fish'),
            DB::raw('sum(cast(household_bee_fish_silkworm.honey_production_kg as INT)) as honey'),
            DB::raw('sum(cast(household_bee_fish_silkworm.silk_production_kg as INT)) as silk'),
        ];
        $where_attr     = [];
        $where_in_attr  = [];
        $group_by_attr  = ['livestock.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getWithFishHoneySilkData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        $final = array_map(function ($val) {
            if (trim($val['category']) == 'मौरी') {
                return [
                    "category" => 'मौरीको मह',
                    "total" => $val['honey'],
                    "unit" => 'के.जि',
                    "type" => 'bee'
                ];
            }

            if (trim($val['category']) == 'माछा') {
                return [
                    "category" => 'माछा',
                    "total" => $val['fish'],
                    "unit" => 'के.जि',
                    "type" => 'fish'
                ];
            }

            if (trim($val['category']) == 'रेशम') {
                return [
                    "category" => 'रेसम कीराको रेशम',
                    "total" => $val['silk'],
                    "unit" => 'के.जि',
                    "type" => 'silk'
                ];
            }
        }, $data);

        return array_values(array_filter($final));
    }

    /**
     * Return data for household livestocks production  data
     * 
     * @param $params
     * @param $type
     * 
     * @return array
     */
    public function getProductionData($params, $type): array
    {
        $milk_items      = ["भेडा", "बाख्रा/खसी/बोका/च्याग्रा", "याक/चौरी", "राँगाभैसी/पाडापाडी", "गाइगोरु/बाच्छाबाच्छी"];
        $meat_bone_items = ["भेडा", "बाख्रा/खसी/बोका/च्याग्रा", "याक/चौरी", "राँगाभैसी/पाडापाडी", "सुँगुर/वंगुर", "खरायो", "कुखुरा/हाँस"];
        $egg_items       = ["कुखुरा/हाँस"];
        $wool_items      = ["भेडा"];

        $select_attr = [
            'livestock.name_np as category',
            DB::raw('sum(cast(household_livestock.milk_production_ltr as INT)) as milk'),
            DB::raw('sum(cast(household_livestock.meat_production_kg as INT)) as meat'),
            DB::raw('sum(cast(household_livestock.bone_skin_production_kg as INT)) as bone'),
            DB::raw('sum(cast(household_livestock.egg_production_kg as INT)) as egg'),
            DB::raw('sum(cast(household_livestock.wool_production_kg as INT)) as wool'),
            DB::raw('sum(cast(household_livestock.total_revenue as INT)) as revenue'),
        ];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['livestock.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->householdRepository->getWithLivestockData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();
        switch ($type) {
            case 'family.milkProd':
                $final = array_map(function ($val) use ($milk_items) {
                    if (in_array(trim($val['category']), $milk_items)) {
                        return [
                            "category" => $val['category'],
                            "total" => $val['milk'],
                            "unit" => 'लिटर',
                            "type" => 'milk_production'
                        ];
                    }
                }, $data);
                break;

            case 'family.meatProd':
                $final = array_map(function ($val) use ($meat_bone_items) {
                    if (in_array(trim($val['category']), $meat_bone_items)) {
                        return [
                            "category" => $val['category'],
                            "total" => $val['meat'],
                            "unit" => 'के.जि',
                            "type" => 'meat_production'
                        ];
                    }
                }, $data);
                break;

            case 'family.boneSkinProd':
                $final = array_map(function ($val) use ($meat_bone_items) {
                    if (in_array(trim($val['category']), $meat_bone_items)) {
                        return [
                            "category" => $val['category'],
                            "total" => $val['meat'],
                            "unit" => 'के.जि',
                            "type" => 'bone_skin_production'
                        ];
                    }
                }, $data);
                break;

            case 'family.otherProd':
                $final = array_map(function ($val) use ($wool_items, $egg_items) {
                    if (in_array(trim($val['category']), $wool_items)) {
                        return [
                            "category" => 'भेडाको ऊन',
                            "total" => $val['wool'],
                            "unit" => 'के.जि',
                            "type" => 'sheep'
                        ];
                    }

                    if (in_array(trim($val['category']), $egg_items)) {
                        return [
                            "category" => 'कुखुरा/हाँसको अन्डा',
                            "total" => $val['egg'],
                            "unit" => 'ओटा',
                            "type" => 'egg'
                        ];
                    }
                }, $data);
                break;

            case 'family.revenue':
                $final = array_map(function ($val) {
                    return [
                        "category" => $val['category'],
                        "total" => $val['revenue'],
                        "unit" => 'NRs',
                        "type" => 'annual_revenue'
                    ];
                }, $data);
                break;
        }
        
        return collect(array_values(array_filter($final)))->sortby('total')->values()->toArray();
    }


    /**
     * Return data for household income vs expenditure vs saving
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAvgIncomeExpensesData($params): array
    {
        $range = ["None", "1-50k", "50k-100k", "100k-300K", "300K-500K", "500K-900K", ">900k"];

        $select_income = [
            DB::raw('sum(case when cast(avg_family_income as INT) <= 0 then 1 else 0 end) as range1'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 1 and cast(avg_family_income as INT) <= 50000 then 1 else 0 end) as range2'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 50001 and cast(avg_family_income as INT) <= 100000 then 1 else 0 end) as range3'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 100001 and cast(avg_family_income as INT) <= 300000 then 1 else 0 end) as range4'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 300001 and cast(avg_family_income as INT) <= 500000 then 1 else 0 end) as range5'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 500001 and cast(avg_family_income as INT) <= 900000 then 1 else 0 end) as range6'),
            DB::raw('sum(case when cast(avg_family_income as INT) > 900001 then 1 else 0 end) as range7'),
        ];

        $select_expenses = [
            DB::raw('sum(case when cast(avg_family_expenditure as INT) <= 0 then 1 else 0 end) as range1'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 1 and cast(avg_family_expenditure as INT) <= 50000 then 1 else 0 end) as range2'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 50001 and cast(avg_family_expenditure as INT) <= 100000 then 1 else 0 end) as range3'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 100001 and cast(avg_family_expenditure as INT) <= 300000 then 1 else 0 end) as range4'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 300001 and cast(avg_family_expenditure as INT) <= 500000 then 1 else 0 end) as range5'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 500001 and cast(avg_family_expenditure as INT) <= 900000 then 1 else 0 end) as range6'),
            DB::raw('sum(case when cast(avg_family_expenditure as INT) >= 900001 then 1 else 0 end) as range7'),
        ];

        $select_saving = [
            DB::raw('sum(case when cast(avg_family_saving as INT) <= 0 then 1 else 0 end) as range1'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 1 and cast(avg_family_saving as INT) <= 50000 then 1 else 0 end) as range2'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 50001 and cast(avg_family_saving as INT) <= 100000 then 1 else 0 end) as range3'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 100001 and cast(avg_family_saving as INT) <= 300000 then 1 else 0 end) as range4'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 300001 and cast(avg_family_saving as INT) <= 500000 then 1 else 0 end) as range5'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 500001 and cast(avg_family_saving as INT) <= 900000 then 1 else 0 end) as range6'),
            DB::raw('sum(case when cast(avg_family_saving as INT) >= 900001 then 1 else 0 end) as range7'),
        ];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = [];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        $income     = $this->householdRepository->getHouseholdData($select_income, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();
        $expenses   = $this->householdRepository->getHouseholdData($select_expenses, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();
        $saving     = $this->householdRepository->getHouseholdData($select_saving, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();

        return [
            "xAxis"         => $range,
            "income"        => is_array($income) ? array_values($income) : [],
            "expediture"    => is_array($expenses) ? array_values($expenses) : [],
            "saving"        => is_array($saving) ? array_values($saving) : []
        ];
    }

    /**
     * Return data for income subsistence
     * 
     * @param $params
     * 
     * @return array
     */
    public function getIncomeSubsistence($params): array
    {
        $map = [
            "३ महिनासम्म" => '३ महिना',
            "४ देखि ६ महिनासम्म" => '४-६ महिना',
            "७ देखि ९ महिनासम्म" => '७-९ महिना',
            "९ महिना भन्दा बढि" => '>९ महिना',
        ];
        $data = $this->countBySingleColumnHousehold('subsistence_of_income', $params);
        
        return array_map(function ($v) use ($map) {
            return [
                'category' => isset($map[$v['category']]) ? $map[$v['category']] : $v['category'],
                'total' => $v['total']
            ];
        }, $data);
    }

    /**
     * Return data for house head gener
     * 
     * @param $params
     * 
     * @return array
     */
    public function getHouseHeadGender($params): array
    {
        return $this->countBySingleColumnHousehold('family_head_gender', $params);
    }

    /**
     * Return data for household no of houses owned data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getHouseholdHouseCount($params): array
    {
        return $this->countBySingleColumnHousehold('house_count', $params);
    }

    /**
     * Return data for land use for agriculture
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAgriLandData($params): array
    {
        $data = $this->countBySingleColumnHousehold('use_of_family_lang_agriculture', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for family livestock data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getLivestocks($params): array
    {
        $data = $this->countBySingleColumnHousehold('livestock', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for family fish bee 
     * 
     * @param $params
     * 
     * @return array
     */
    public function getFishBeeSilk($params): array
    {
        $data = $this->countBySingleColumnHousehold('fish_honeybee_silkworm', $params);
        return booleanDataFormat($data);
    }

    /**
     * Return data for land use for agriculture
     * 
     * @param $params
     * 
     * @return array
     */
    public function getBankingData($params): array
    {
        $data = $this->countBySingleColumnHousehold('has_bank_account', $params);
        return booleanDataFormat($data);
    }

    /**
     * Query for single source of data for Household model;
     * 
     * @param $column
     * @param $params
     * 
     * @return array
     */
    private function countBySingleColumnHousehold($column, $params): array
    {
        $select_attr   = ["$column as category", DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = [$column];
        $ward          = isset($params['ward']) ? explode(',', $params['ward']) : [];

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getHouseholdData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
    }

    /**
     * Query for single source of data for HouseholdHome model;
     * 
     * @param $column
     * @param $ward
     * 
     * @return array
     */
    private function countBySingleColumnHome($column, $params): array
    {
        $select_attr   = ["$column as category", DB::raw('count(*) as total')];
        $where_in_attr = [];
        $where_attr    = [];
        $group_by_attr = [$column];
        $ward          = isset($params['ward']) ? explode(',', $params['ward']) : [];
        $routename     =  Route::currentRouteName();
        $sort          = ($routename == "household.houseCount") ? 'category' : 'total';

        if ($ward) {
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdHomeRepository->getHouseholdHome($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy($sort)->values()->toArray();
    }
}
