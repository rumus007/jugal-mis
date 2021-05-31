<?php

declare(strict_types=1);

namespace App\Constants;

/**
 * List of used enum values for database table
 * Class Enums
 * @package App\Constants
 */
abstract class Enums
{

    const RESOURCE_TYPE = [
        'business_trade',
        'natural_resource',
        'land_use',
        'ngo_club_group',
        'building',
        'bridge_culvert',
        'cultural_heritage',
        'industry_hydro',
        'educational_institute',
        'health_institute',
        'hotel_resort_homestay',
        'bank_financial',
        'security_agency'
    ];

    const EDUCATIONAL_TYPE = [
        'समुदायिक' => 'community',
        'सरकारी' => 'government',
    ];

    const HEALTH_TYPE = [
        'निजी क्लिनिक' => 'personal_clinic',
        'प्राथमिक स्वास्थ्य केन्द्र' => 'primary_health_center',
        'सामुदायिक स्वास्थ्य इकाई' => 'community_health_unit',
        'स्वास्थ्य चौकी' => 'health_post'
    ];

    const NATURAL_TYPE = [
        'pond',
        'cave',
        'pool',
        'waterfall',
        'mine',
        'water_source',
        'others'
    ];

    const BUSINESS_OWNERSHIP = [
        'private',
        'public'
    ];

    const LAND_USE = [
        'कृषि क्षेत्र' => 'agriculture',
        'चरन क्षेत्र' => 'pasture',
        'वन क्षेत्र' => 'forest',
        'सार्वजनिक क्षेत्र (खेल मैदान, पार्क, पक्निक स्थल, मनोरञ्जन स्थल)' => 'public',
        'संवेदनशील क्षेत्र (बाढी, पहिरो, नदी कट्टान, ढुबान, सुख्खा)' => 'vulnerable',
        'औधोगिक क्षेत्र' => 'industrial'
    ];

    const PUBLIC_AREA_TYPE = [
        'खेल मैदान' => 'playground',
        'पार्क' => 'park',
        'पक्निक स्थल' => 'picnic_spot',
        'मनोरञ्जन स्थल' => 'amusement_park'
    ];

    const VULNERABLE_TYPE = [
        'flood',
        'landslide',
        'erosion',
        'drought',
        'duban'
    ];

    const INDUSTRY_OWNERSHIP = [
        'निजी' => 'private',
        'साझेदारी' => 'partnership'
    ];

    const INDUSTRY_TYPE = [
        'घरेलु' => 'domestic',
        'लघु' => 'micro',
        'साना' => 'small',
        'मध्यम' => 'medium',
        'ठुला' => 'large'
    ];

    const INDUSTY_PRODUCT = [
        'जलविद्युत' => 'hydropower',
        'खाद्यन्न' => 'food_grains',
        'फर्निचर/काठ' => 'furniture_wood',
        'फलामजन्य' => 'metal',
        'स्टेसनरी (कपी, किताब आदि)' => 'stationary',
        'लत्ताकपडा' => 'cloth'
    ];

    const BUILDING_TYPE = [
        'समुदायिक' => 'community',
        'सरकारी' => 'government',
        'सहकारी' => 'cooperative'
    ];

    const BUILDING_CATEGORY = [
        'वडा स्तर' => 'ward_level',
        'नगर/गाउँ स्तर' => 'town_village_level'
    ];

    const CONDITION = [
        'राम्रो' => 'good',
        'ठिकै' => 'satisfactory',
        'जिर्ण' => 'worn_out'
    ];

    const HOTEL_TYPE = [
        'hotel',
        'resort',
        'homestay'
    ];

    const GROUP_TYPE = [
        'ngo',
        'club',
        'group'
    ];

    const HOUSE_OWNERSHIP = [
        "निजी/आफ्नै",
        "आफ्न्त",
        "भाडामा",
        "संस्थागत",
        "अन्य",
    ];

    const HOUSE_FOUNDATION = [
        "लोड वेयरिङ्ग",
        "काठको खम्बा",
        "अन्य",
        "फ्रेम स्ट्रक्चर",
        "सिमेन्ट र ढुङ्गा",
        "माटो र ढुङ्गा",
    ];

    const ROAD_TO_HOUSE = [
        "घोडेटो",
        "बाटो नभएको",
        "मोटरबाटो",
        "गोरेटो",
    ];

    const ROAD_TYPE = [
        "पक्की",
        "कच्ची",
        "N/A"
    ];
}
