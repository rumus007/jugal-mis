<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Repositories\Resource\ResourceRepository;
use App\Services\Resource\ResourceService;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * ResourceController Constructor
     * 
     * @param ResourceService $resourceService
     */
    public function __construct(
        public ResourceService $resourceService
    ) {
    }

    /**
     * Returns api response for Resource profile stats
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getResourceStats(Request $request)
    {
        try {
            return response()->json($this->resourceService->getResourceStats($request->ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for Resource profile map data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getResourceMapData(Request $request)
    {
        try {
            return response()->json($this->resourceService->getResourceMapData($request->resource_type_id, $request->ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
