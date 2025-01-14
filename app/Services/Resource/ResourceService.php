<?php

namespace App\Services\Resource;

use App\Repositories\Resource\ResourceRepository;
use App\Repositories\Resource\ResourceTypeRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ResourceService
 *
 * @package App\Services\Resource
 */
class ResourceService
{
    /**
     * ResourceService Constructor
     * 
     * @param ResourceRepository $resourceRepository
     * @param ResourceTypeRepository $resourceTypeRepository
     */
    public function __construct(
        public ResourceRepository $resourceRepository,
        public ResourceTypeRepository $resourceTypeRepository
    ) {
    }

    /**
     * Get count of resource profile according to selected ward
     * 
     * @param $params
     * 
     * @return array
     */
    public function getResourceStats($params): array
    {
        $ward          = isset($params['ward']) ? explode(',', $params['ward']) : [];
        $select_attr   = ['resource_type.id', 'resource_type.name_np as nepali_name', 'resource_type.name as resource_profile', DB::raw('count(*) as total')];
        $where_attr    = [];
        $where_in_attr = count($ward) ? [['resource.ward', $ward]] : [];
        $group_by_attr = ['resource_type.id', 'resource_type.name_np', 'resource_type.name'];
        $data          = $this->resourceRepository->getWithResourceType($select_attr, $where_attr, $where_in_attr, $group_by_attr);

        return prepareResponseFormat($data);
    }

    /**
     * Get resource information according to selected ward and resource type 
     * 
     * @param $params
     * 
     * @return array
     */
    public function getResourceMapData($params): array
    {
        $ward = isset($params['ward']) ? explode(',', $params['ward']) : [];
        $resource_type_id = isset($params['resource_type_id']) ? explode(',', $params['resource_type_id']) : [];

        $select_attr   = [
            'resource_type.id as resource_type_id',
            'resource_type.name as resource_type',
            'resource.address',
            'resource.local_name',
            'resource.contact_number',
            'resource.website',
            'resource.geo_code',
            'resource.geo_latitude',
            'resource.geo_longitude',
            'resource.geo_altitude',
            'resource.geo_precision',
            'resource.photo',
            'resource.metadata',
        ];
        $where_attr    = [];
        $where_in_attr = [];
        $group_by_attr = [];

        if ($ward) {
            $where_in_attr[] = ['resource.ward', $ward];
        }

        if ($resource_type_id) {
            $where_in_attr[] = ['resource.resource_type_id', $resource_type_id];
        }

        $data = $this->resourceRepository->getWithResourceType($select_attr, $where_attr, $where_in_attr, $group_by_attr)->toArray();

        $data = array_map(function ($v) {
            $v['metadata'] = json_decode($v['metadata']);
            $v['leaflet_geolocation'] = [$v['geo_latitude'], $v['geo_longitude']];
            return $v;
        }, $data);

        return prepareResponseFormat($data);
    }
}
