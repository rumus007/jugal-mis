<?php

declare(strict_types=1);


/**
 * Returns english equivalent of nepali number
 *
 * @param $number
 *
 * @return string
 */
function getEnglishNumber($number): string
{
    $mapping = preg_split('//u', "०१२३४५६७८९", -1, PREG_SPLIT_NO_EMPTY);

    return str_replace($mapping, array_keys($mapping), $number);
}

/**
 * Prepares response for api
 *
 * @param $data
 *
 * @return array
 */
function prepareResponseFormat($data): array
{
    $response = [
        "status"  => "Success",
        "message" => "",
        "data"    => $data
    ];

    return $response;
}


/**
 * Prepare data for boolean type (yes/no)
 * 
 * @param $data
 * 
 * @return array
 */
function booleanDataFormat($data): array
{
    $format = [
        'छ' => 0,
        'छैन' => 0,
    ];

    foreach ($data as $v) {
        if ($v['category']) {
            $format['छ'] = $v['total'];
            continue;
        }

        $format['छैन'] = $v['total'];
    }

    $final = array_map(function ($val, $key) {
        return [
            "category" => $key,
            "total" => $val
        ];
    }, $format, array_keys($format));

    return $final;
}

/**
 * Prepare data for data containg null category
 * 
 * @param $data
 * 
 * @return array
 */
function nullDataFormat($data): array
{
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
 * Prepare age range data for age group API
 * 
 * @param int $min
 * @param int $max
 * 
 * @return array
 */
function createAgeGroupArray($min, $max): array
{
    if ($min >= $max) {
        throw new Exception("Max age must be greater than min age");
    }

    if ($min < 5 && $max > 50) {
        return [
            [
                "start" => $min,
                "end" => 5,
                "name" => "range_0"
            ],
            [
                "start" => 6,
                "end" => 16,
                "name" => "range_1"
            ],
            [
                "start" => 17,
                "end" => 50,
                "name" => "range_2"
            ],
            [
                "start" => 51,
                "end" => $max,
                "last" => true,
                "name" => "range_3"
            ]
        ];
    }

    $diff = $max - $min;
    $interval_data = [];

    switch (true) {
        case in_array($diff, range(0, 7)):
            $interval = 1;
            break;
        case in_array($diff, range(8, 12)):
            $interval = 2;
            break;
        case in_array($diff, range(13, 35)):
            $interval = 5;
            break;
        case in_array($diff, range(36, 60)):
            $interval = 10;
            break;
        case in_array($diff, range(61, 100)):
            $interval = 20;
            break;
    }

    $loop = (int) round($diff / $interval);

    for ($i = 0; $i < $loop; $i++) {
        $start = $i == 0 ? $min : $interval_data[$i - 1]['end'] + 1;
        $end = $start + $interval;
        $topush = [
            "start" => $start,
            "end" => $end,
            "name" => "range_$i"
        ];

        $interval_data[] = $topush;

        if($end >= $max){
            $interval_data[$i]['end'] = $max;;
            break;
        }
    }
    
    return $interval_data;
}
