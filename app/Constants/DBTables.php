<?php

declare(strict_types=1);


namespace App\Constants;


/**
 * Class DBTables
 * @package App\Constants
 */
abstract class DBTables
{
    /**
     * List of database table names
     */
    const RESOURCE_TYPE     = 'resource_type';
    const RESOURCE          = 'resource';
    const HOUSEHOLD         = 'household';
    const INDIVIDUAL        = 'individual';
    const FACILITIES        = 'facilities';
    const WASTE_MGMT        = 'waste_mgmt';
    const BIRTHPLACE        = 'birthplace';
    const DISASTOR          = 'disastor';
    const WATER_DISTANCE    = 'water_distance';
    const INCOME_SRC        = 'income_src';

    /**
     * List of pivot table names
     */
    const HOUSEHOLD_FACILITIES      = 'household_facilities';
    const HOUSEHOLD_WASTE_MGMT      = 'household_waste_mgmt';
    const HOUSEHOLD_BIRTHPLACE      = 'household_birthplace';
    const HOUSEHOLD_DISASTOR        = 'household_disastor';
    const HOUSEHOLD_WATER_DISTANCE  = 'household_water_distance';
    const HOUSEHOLD_INCOME_SRC      = 'household_income_src';
}
