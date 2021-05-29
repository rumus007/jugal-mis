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

    const HOUSEHOLD_FACILITIES = 'household_facilities';
}
