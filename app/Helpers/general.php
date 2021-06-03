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
        'yes' => 0,
        'no' => 0,
    ];

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
