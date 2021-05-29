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
    const RESOURCE_TYPE = 'resource_type';
    const RESOURCE      = 'resource';
    const HOUSEHOLD     = 'household';
    const INDIVIDUAL    = 'individual';
    const FACILITIES    = 'facilities';
    const WASTE_MGMT    = 'waste_mgmt';

    const HOUSEHOLD_FACILITIES = 'household_facilities';
    const HOUSEHOLD_WASTE_MGMT = 'household_waste_mgmt';
}
