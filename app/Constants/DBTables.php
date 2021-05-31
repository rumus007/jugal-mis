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
    const LAND_TITLE        = 'land_title';
    const AGRI_PRODUCT      = 'agri_product';
    const LIVESTOCK         = 'livestock';

    /**
     * List of database table names related to household module
     */
    const HOUSEHOLD_LIVESTOCK           = 'household_livestock';
    const HOUSEHOLD_BEE_FISH_SILKWORM   = 'household_bee_fish_silkworm';
    const HOUSEHOLD_HOME                = 'household_home';

    /**
     * List of pivot table names
     */
    const HOUSEHOLD_FACILITIES      = 'household_facilities';
    const HOUSEHOLD_WASTE_MGMT      = 'household_waste_mgmt';
    const HOUSEHOLD_BIRTHPLACE      = 'household_birthplace';
    const HOUSEHOLD_DISASTOR        = 'household_disastor';
    const HOUSEHOLD_WATER_DISTANCE  = 'household_water_distance';
    const HOUSEHOLD_INCOME_SRC      = 'household_income_src';
    const HOUSEHOLD_LAND_TITLE      = 'household_land_title';
    const HOUSEHOLD_AGRI_PRODUCT    = 'household_agri_product';
}
