<?php

declare(strict_types=1);

namespace App\Services\Individual;

use App\Repositories\Household\HouseholdRepository;
use App\Repositories\Individual\IndividualRepository;
use Exception;
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
     * 
     * @param IndividualRepository $individualRepository
     * @param HouseholdRepository $householdRepository
     */
    public function __construct(
        public IndividualRepository $individualRepository,
        public HouseholdRepository $householdRepository
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
        return nullDataFormat($data);
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
     * Population by mobile phone holders
     * 
     * @param $params
     * 
     * @return array
     */
    public function getMobileData($params): array
    {
        $data = $this->getSingleColumnData('has_mobile', $params);
        return booleanDataFormat($data);
    }

    /**
     * Population by disability identification
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDisabilityIdData($params): array
    {
        $select_attr = ["individual.disability_identification as category", 'individual.disability_status'];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = [];
        $where_raw = "";

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)
            ->filter(function ($item) {
                if ($item->disability_status != "अपाङ्गता नभएको") {
                    return $item;
                }
            });

        $count = $data->countBy(function ($item) {
            return $item['category'];
        })->sort()->toArray();

        return array_map(function ($k, $v) {
            return [
                "category" => $k ? $k : "N/A",
                "total" => $v
            ];
        }, array_keys($count), $count);
    }

    /**
     * Population by mobile telecom data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getMobileTelecomData($params): array
    {
        $data = $this->getSingleColumnData('telecom', $params);

        return array_filter($data, function ($val) {
            if (!is_null($val['category'])) {
                return $val;
            }
        });
    }

    /**
     * Population education status (Literacy rate)
     * 
     * @param $params
     * 
     * @return array
     */
    public function getLiteracyData($params): array
    {
        $education = [
            "शिक्षित" => 0,
            "अशिक्षित" => 0
        ];
        $data = $this->getSingleColumnData('education_level', $params);

        foreach ($data as $v) {
            if ($v['category'] == "पढाई शुरु नगरेको (नाबालक)" || $v['category'] == "लेखपढ गर्न नसक्ने (निरक्षर)") {
                $education['अशिक्षित'] += $v['total'];
                continue;
            }

            $education['शिक्षित'] += $v['total'];
        }

        return array_map(function ($k, $v) {
            return [
                "category" => $k,
                "total" => $v
            ];
        }, array_keys($education), $education);
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
     * Population having private business
     * 
     * @param $params
     * 
     * @return array
     */
    public function getPrivateBusinessData($params): array
    {
        $data = $this->getSingleColumnData('employment_status', $params);

        return array_values(array_filter($data, function ($v) {
            if ($v['category'] == "उद्योग तथा व्यापार") {
                return $v;
            }
        }));
    }

    /**
     * Population foreign employment-status wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getForeignEmploymentData($params): array
    {
        $select_attr = ["individual.employment_status", 'individual.in_foreign_country', 'individual.foreign_country'];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = [];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)
            ->filter(function ($item) {
                if ($item->employment_status == "वैदेशिक रोजगारी") {
                    return $item;
                }
            });

        $count = $data->countBy(function ($item) {
            return $item['foreign_country'];
        })->toArray();

        return array_map(function ($k, $v) {
            return [
                "category" => $k ? $k : "N/A",
                "total" => $v
            ];
        }, array_keys($count), $count);
    }

    /**
     * Population employment-status wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getEmploymentStatusData($params): array
    {
        $data = $this->getSingleColumnData('employment_status', $params);
        return nullDataFormat($data);
    }

    /**
     * Population training taken data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getTrainingData($params): array
    {
        $data = $this->getSingleColumnData('training_taken', $params);
        $data = array_map(function ($v) {
            return [
                "category" => $v['category'] ? ($v['category'] == "Yes" ? 'छ' : 'छैन') : null,
                "total" => $v['total']
            ];
        }, $data);
        return nullDataFormat($data);
    }

    /**
     * Population training types data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getTrainingTypeData($params): array
    {
        $final = [];
        $types = [
            "technology" => "सूचना तथा प्रविधि, इलेक्ट्रीकल र इलेक्ट्रोनिक्स",
            "tailor_boutique" => "सिलाई बुनाई, बुटिक, सृंगार, पार्लर",
            "construction" => "निर्माण सम्बन्धी",
            "engineering" => "इञ्जिनियरिङ्ग, अटोमोवाइल र मेकानिक्स",
            "agricultural" => "कृषि सम्बन्धी",
            "public_health" => "जनस्वास्थ्य सम्बन्धी",
            "animal_health" => "पशुस्वास्थ्य सम्बन्धी",
            "forestry" => "वन सम्बन्धी",
            "tourism" => "पर्यटन टुर गाइड, ट्राभल र सत्कार",
            "art" => "कला सम्बन्धी",
            "other" => "अन्य",
            // "none" => "कुनै पनि छैन",
            // "no_data" => "N/A",
        ];

        $select_attr = [
            DB::raw("sum(case when individual.trainings->>'technology' = 'true' then 1 else 0 end) as technology"),
            DB::raw("sum(case when individual.trainings->>'tailor_boutique' = 'true' then 1 else 0 end) as tailor_boutique"),
            DB::raw("sum(case when individual.trainings->>'construction' = 'true' then 1 else 0 end) as construction"),
            DB::raw("sum(case when individual.trainings->>'engineering' = 'true' then 1 else 0 end) as engineering"),
            DB::raw("sum(case when individual.trainings->>'agricultural' = 'true' then 1 else 0 end) as agricultural"),
            DB::raw("sum(case when individual.trainings->>'public_health' = 'true' then 1 else 0 end) as public_health"),
            DB::raw("sum(case when individual.trainings->>'animal_health' = 'true' then 1 else 0 end) as animal_health"),
            DB::raw("sum(case when individual.trainings->>'forestry' = 'true' then 1 else 0 end) as forestry"),
            DB::raw("sum(case when individual.trainings->>'tourism' = 'true' then 1 else 0 end) as tourism"),
            DB::raw("sum(case when individual.trainings->>'art' = 'true' then 1 else 0 end) as art"),
            DB::raw("sum(case when individual.trainings->>'other' = 'true' then 1 else 0 end) as other"),
            // DB::raw("sum(case when individual.trainings->>'none' = 'true' then 1 else 0 end) as none"),
            // DB::raw("sum(case when individual.training_taken is null then 1 else 0 end) as no_data"),
        ];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = [];
        $where_raw = "";

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)->first()?->toArray();
        asort($data);

        foreach ($data as $k => $v) {
            if (array_key_exists($k, $types)) {
                $final[] = [
                    "category" => $types[$k],
                    "total" => $v
                ];
            }
        }

        return $final;
    }

    /**
     * Population by voter pop
     * 
     * @param $params
     * 
     * @return int
     */
    public function getVoterPop($params): int
    {

        $select_attr = [
            DB::raw('sum(case when cast(individual.age as FLOAT) >= 18 then 1 else 0 end) as voter'),
        ];
        $where_attr = [
            ['individual.age_group', 'वर्ष']
        ];
        $where_in_attr = [];
        $group_by_attr = [];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();
        return $data['voter'];
    }

    /**
     * Population by population max involved sector
     * 
     * @param $params
     * 
     * @return string
     */
    public function getMaxInvolvedSector($params): string
    {

        $employements = [
            "उद्योग तथा व्यापार",
            "नोकरी/जागीर",
            "वैदेशिक रोजगारी",
            "कृषि तथा पशुपालन",
            "ज्याला/मजदुरी",
            "व्यावसायिक कार्य (पत्रकार, वकिल, परामर्श, ठेक्कापट्टा, पुजारी आदि",
            "अन्य"
        ];

        $select_attr = ['individual.employment_status', DB::raw('count(*) as total'),];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = ['individual.employment_status'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortByDesc('total')->first();

        return $data ? $data->employment_status : "N/A";
    }

    /**
     * Population by gender wise max involved sector
     * 
     * @param $params
     * 
     * @return array
     */
    public function getEmploymentWise($params): array
    {
        $map = [
            'पुरुष' => 'male',
            "महिला" => 'female',
            'तेश्रो लिङ्गी' => 'others'
        ];

        $final = [
            'male' => '',
            'female' => '',
            'others' => ''
        ];

        $employements = [
            "उद्योग तथा व्यापार",
            "नोकरी/जागीर",
            "वैदेशिक रोजगारी",
            "कृषि तथा पशुपालन",
            "ज्याला/मजदुरी",
            "व्यावसायिक कार्य (पत्रकार, वकिल, परामर्श, ठेक्कापट्टा, पुजारी आदि",
            "अन्य"
        ];

        $select_attr = ['individual.gender', 'individual.employment_status', DB::raw('count(*) as total'),];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = ['individual.gender', 'individual.employment_status'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->groupBy('gender')->toArray();

        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if (!in_array($v['employment_status'], $employements)) {
                    unset($data[$key][$k]);
                }
            }
        }

        foreach ($data as $key => $value) {
            $collection = collect($value);
            $most_involved = $collection->sortByDesc('total')->first();
            if ($most_involved && isset($final[$map[$key]])) {
                $final[$map[$key]] = $most_involved['employment_status'];
            }
        }

        return $final;
    }

    /**
     * Population by age group
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAgeGroupData($params): array
    {
        $age_groups     = [];
        $select_attr    = [];
        $min            = array_key_exists('minage', $params) ? (int) $params['minage'] : 0;
        $max            = array_key_exists('maxage', $params) ? (int) $params['maxage'] : 100;
        $ageArray       = createAgeGroupArray($min, $max);

        foreach ($ageArray as $key => $val) {
            $firstExpression = "sum(case when cast(individual.age as FLOAT) >= " . $val['start'];
            $secondExpression = array_key_exists('end', $val) ? " and cast(individual.age as FLOAT) <= " . $val['end'] . " then 1 else 0 end) as range_" . $key : " then 1 else 0 end) as range_" . $key;
            $sqlExpression = $firstExpression . $secondExpression;
            $select_attr[] = DB::raw($sqlExpression);
        }

        $where_attr = [
            ['individual.age_group', 'वर्ष']
        ];
        $where_in_attr = [];
        $group_by_attr = [];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();

        $select = [DB::raw('count(*) as outliers')];
        $where = [
            ['individual.age_group', '!=', 'वर्ष']
        ];

        $data2 = $min == 0 ? $this->individualRepository->getWithHousehold($select, $where, $where_in_attr)->first()?->toArray() : [];

        if($data2) {
            $data['range_0'] += $data2['outliers'];
        }

        foreach ($ageArray as $key => $val) {
            $str = ($val['start'] == $val['end']) ? $val['end'] : (isset($val['last']) ? $val['start'] . "+" : $val['start'] . "-" . $val['end']);
            $age_groups[$str] = array_key_exists($val['name'], $data) ? $data[$val['name']] : 0;
        }

        return array_map(function ($k, $v) {
            return [
                "category" => $k,
                "total" => $v
            ];
        }, array_keys($age_groups), $age_groups);
    }

    /**
     * Population disability wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDisabilityData($params): array
    {
        $disability = [
            'छ' => 0,
            'छैन' => 0
        ];

        $data = $this->getSingleColumnData('disability_status', $params);

        foreach ($data as $v) {
            if ($v['category'] == "अपाङ्गता नभएको") {
                $disability['छैन'] += $v['total'];
                continue;
            }

            $disability['छ'] += $v['total'];
        }

        return array_map(function ($k, $v) {
            return [
                "category" => $k,
                "total" => $v
            ];
        }, array_keys($disability), $disability);
    }

    /**
     * Population disability wise
     * 
     * @param $params
     * 
     * @return array
     */
    public function getDisabilityTypesData($params): array
    {
        $data = $this->getSingleColumnData('disability_status', $params);

        return array_filter($data, function ($v) {
            if ($v['category'] != "अपाङ्गता नभएको") {
                return $v;
            }
        });
    }

    /**
     * Population with government identification
     * 
     * @param $params
     * 
     * @return array
     */
    public function getGovernmentIdData($params): array
    {
        $final = [];

        $types = [
            "citizenship" => "नागरिकता",
            "poverty_id" => "गरिब परिचयपत्र",
            "senior_citizen_id" => "जेष्ठ नागरिक परिचयपत्र",
            "single_female_id" => "एकल महिला परिचयपत्र",
            "national_id" => "राष्ट्रिय परिचयपत्र",
            "driver_license" => "सवारी चालक इजाजत पत्र",
            "voter_id" => "मतदता परिचय पत्र",
            "dont_know" => "थाहा छैन",
            "none" => "छैन",
        ];
        $select_attr = [
            DB::raw("sum(case when individual.identifications->>'citizenship' = 'true' then 1 else 0 end) as citizenship"),
            DB::raw("sum(case when individual.identifications->>'poverty_id' = 'true' then 1 else 0 end) as poverty_id"),
            DB::raw("sum(case when individual.identifications->>'senior_citizen_id' = 'true' then 1 else 0 end) as senior_citizen_id"),
            DB::raw("sum(case when individual.identifications->>'single_female_id' = 'true' then 1 else 0 end) as single_female_id"),
            DB::raw("sum(case when individual.identifications->>'national_id' = 'true' then 1 else 0 end) as national_id"),
            DB::raw("sum(case when individual.identifications->>'driver_license' = 'true' then 1 else 0 end) as driver_license"),
            DB::raw("sum(case when individual.identifications->>'voter_id' = 'true' then 1 else 0 end) as voter_id"),
            DB::raw("sum(case when individual.identifications->>'dont_know' = 'true' then 1 else 0 end) as dont_know"),
            DB::raw("sum(case when individual.identifications->>'none' = 'true' then 1 else 0 end) as none")
        ];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = [];
        $where_raw = "";

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)->first()?->toArray();
        asort($data);

        foreach ($data as $k => $v) {
            if (array_key_exists($k, $types)) {
                $final[] = [
                    "category" => $types[$k],
                    "total" => $v
                ];
            }
        }

        return $final;
    }


    /**
     * Citizenship status data
     * 
     * @param $params
     * 
     * @return array
     */
    public function getCitizenshipStatus($params): array
    {
        $select_attr = [
            DB::raw("sum(case when individual.identifications->>'citizenship' = 'true' then 1 else 0 end) as yes"),
            DB::raw("sum(case when individual.identifications->>'citizenship' = 'false' then 1 else 0 end) as no"),
        ];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = [];
        $where_raw = "";

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)->first()?->toArray();
        asort($data);

        return array_map(function ($k, $v) {
            return [
                'category' => $k == 'yes' ? 'छ' : 'छैन',
                'total' => $v
            ];
        }, array_keys($data), $data);
    }

    /**
     * Citizenship status data
     * 
     * @param $params
     * @param $route
     * 
     * @return array
     */
    public function getDiseaseStatus($params, $route): array
    {
        $final = [];
        $select_attr = [];
        $where_attr = [];
        $where_in_attr = [];
        $group_by_attr = [];
        $where_raw = "";

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        if ($route == 'individual.byProlongedDisease') {
            $types = [
                "heart_related" => "मुटु सम्बन्धी रोग",
                "cancer" => "क्यान्सर",
                "tuberculosis" => "क्षयरोग",
                "respiratory" => "श्वासप्रशास सम्बन्धी रोग",
                "diabetes" => "मधुमेह",
                "hiv_aids" => "एचआईभी एड्स",
                "high_blood_pressure" => "उच्च रक्तचाप/ब्लड प्रेसर",
                "kidney_related" => "मृगौला सम्बन्धी रोग",
                "malnutrition" => "कुपोषण",
                "brain_related" => "मस्तिष्क",
                "other" => "अन्य"
            ];

            $select_attr = [
                DB::raw("sum(case when individual.chronic_disease->>'heart_related' = 'true' then 1 else 0 end) as heart_related"),
                DB::raw("sum(case when individual.chronic_disease->>'cancer' = 'true' then 1 else 0 end) as cancer"),
                DB::raw("sum(case when individual.chronic_disease->>'tuberculosis' = 'true' then 1 else 0 end) as tuberculosis"),
                DB::raw("sum(case when individual.chronic_disease->>'respiratory' = 'true' then 1 else 0 end) as respiratory"),
                DB::raw("sum(case when individual.chronic_disease->>'diabetes' = 'true' then 1 else 0 end) as diabetes"),
                DB::raw("sum(case when individual.chronic_disease->>'hiv_aids' = 'true' then 1 else 0 end) as hiv_aids"),
                DB::raw("sum(case when individual.chronic_disease->>'high_blood_pressure' = 'true' then 1 else 0 end) as high_blood_pressure"),
                DB::raw("sum(case when individual.chronic_disease->>'kidney_related' = 'true' then 1 else 0 end) as kidney_related"),
                DB::raw("sum(case when individual.chronic_disease->>'malnutrition' = 'true' then 1 else 0 end) as malnutrition"),
                DB::raw("sum(case when individual.chronic_disease->>'brain_related' = 'true' then 1 else 0 end) as brain_related"),
                DB::raw("sum(case when individual.chronic_disease->>'other' = 'true' then 1 else 0 end) as other"),
            ];
        } elseif ($route == 'individual.byCommonDisease') {
            $types = [
                "typhoid" => 'ज्वरो/टाइफाइड',
                "diarrhoea" => 'झाडापखाला/बान्ता',
                "jaundice" => 'जन्डिस',
                "limb_fall" => 'आंग खस्ने',
                "pneumonia" => 'निमोनिया',
                "other" => 'अन्य'
            ];

            $select_attr = [
                DB::raw("sum(case when individual.common_disease->>'typhoid' = 'true' then 1 else 0 end) as typhoid"),
                DB::raw("sum(case when individual.common_disease->>'diarrhoea' = 'true' then 1 else 0 end) as diarrhoea"),
                DB::raw("sum(case when individual.common_disease->>'jaundice' = 'true' then 1 else 0 end) as jaundice"),
                DB::raw("sum(case when individual.common_disease->>'limb_fall' = 'true' then 1 else 0 end) as limb_fall"),
                DB::raw("sum(case when individual.common_disease->>'pneumonia' = 'true' then 1 else 0 end) as pneumonia"),
                DB::raw("sum(case when individual.common_disease->>'other' = 'true' then 1 else 0 end) as other"),
            ];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)->first()?->toArray();
        asort($data);

        foreach ($data as $k => $v) {
            if (array_key_exists($k, $types)) {
                $final[] = [
                    "category" => $types[$k],
                    "total" => $v
                ];
            }
        }

        return $final;
    }

    /**
     * Household vaccine status
     * 
     * @param $params
     * 
     * @return array
     */
    public function getVaccineStatus($params): array
    {
        $select_attr = ['vaccine.name_np as category', DB::raw('count(*) as total')];
        $where_attr  = [];
        $where_in_attr = [];
        $group_by_attr = ['vaccine.name_np'];

        if (isset($params['ward']) && $params['ward']) {
            $ward = explode(',', $params['ward']);
            $where_in_attr[] = ['ward', $ward];
        }

        return $this->householdRepository->getWithVaccineData($select_attr, $where_attr, $where_in_attr, $group_by_attr)->sortBy('total')->values()->toArray();
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
        $where_raw = "";
        $group_by_attr = ["individual.$column"];

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        if (isset($params['minage']) && $params['maxage']) {
            $where_raw = $this->getRawQueryForAgeGroup($params['minage'], $params['maxage']);
        }

        return $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr, $where_raw)->sortBy('total')->values()->toArray();
    }

    /**
     * Get raw query for individual for age group
     * 
     * @param int $min
     * @param int $max
     * 
     * @return string
     */
    private function getRawQueryForAgeGroup($min, $max): string
    {
        if ($min >= $max) {
            throw new Exception('Max age must be greater than mininum age', 400);
        }

        $operator = $min == 0 ? 'or' : 'and';
        $condition = $min == 0 ? '!=' : '=';

        return "(cast(individual.age as float) between $min and $max) $operator individual.age_group $condition 'वर्ष'";
    }
}
