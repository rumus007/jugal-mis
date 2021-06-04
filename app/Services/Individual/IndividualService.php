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
        return $this->getSingleColumnData('has_mobile', $params);
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

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)
            ->filter(function ($item) {
                if ($item->disability_status != "अपाङ्गता नभएको") {
                    return $item;
                }
            });

        $count = $data->countBy(function ($item) {
            return $item['category'];
        })->toArray();

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
            "Literate" => 0,
            "Illiterate" => 0
        ];
        $data = $this->getSingleColumnData('education_level', $params);

        foreach ($data as $v) {
            if ($v['category'] == "पढाई शुरु नगरेको (नाबालक)" || $v['category'] == "लेखपढ गर्न नसक्ने (निरक्षर)") {
                $education['Illiterate'] += $v['total'];
                continue;
            }

            $education['Literate'] += $v['total'];
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

        if (isset($params['ward']) && $params['ward']) {
            $ward = $params['ward'] ? explode(',', $params['ward']) : [];
            $where_in_attr[] = ['ward', $ward];
        }

        $data = $this->individualRepository->getWithHousehold($select_attr, $where_attr, $where_in_attr, $group_by_attr)->first()?->toArray();

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
     * Population by age group
     * 
     * @param $params
     * 
     * @return array
     */
    public function getAgeGroupData($params): array
    {
        $age_groups = [
            "0-5" => 0,
            "5-16" => 0,
            "16-50" => 0,
            "50+" => 0,
        ];

        $select_attr = [
            DB::raw('sum(case when cast(individual.age as FLOAT) >= 0 and cast(individual.age as FLOAT) <= 5 then 1 else 0 end) as infant'),
            DB::raw('sum(case when cast(individual.age as FLOAT) >= 6 and cast(individual.age as FLOAT) <= 16 then 1 else 0 end) as children'),
            DB::raw('sum(case when cast(individual.age as FLOAT) >= 17 and cast(individual.age as FLOAT) <= 50 then 1 else 0 end) as youth'),
            DB::raw('sum(case when cast(individual.age as FLOAT) >= 51 then 1 else 0 end) as elderly'),
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

        $select = [DB::raw('count(*) as outliers')];
        $where = [
            ['individual.age_group', '!=', 'वर्ष']
        ];

        $data2 = $this->individualRepository->getWithHousehold($select, $where, $where_in_attr)->first()?->toArray();

        $merged = array_merge($data, $data2);

        foreach ($merged as $k => $v) {
            if ($k == "outliers" || $k == "infant") {
                $age_groups["0-5"] += $v;
            }

            if ($k == "children") {
                $age_groups["5-16"] += $v;
            }

            if ($k == "youth") {
                $age_groups["16-50"] += $v;
            }

            if ($k == "elderly") {
                $age_groups["50+"] += $v;
            }
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
            'yes' => 0,
            'no' => 0
        ];

        $data = $this->getSingleColumnData('disability_status', $params);

        foreach ($data as $v) {
            if ($v['category'] == "अपाङ्गता नभएको") {
                $disability['no'] += $v['total'];
                continue;
            }

            $disability['yes'] += $v['total'];
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
