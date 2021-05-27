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
