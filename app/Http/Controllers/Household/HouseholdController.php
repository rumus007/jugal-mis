<?php

declare(strict_types=1);

namespace App\Http\Controllers\Household;

use App\Http\Controllers\Controller;
use App\Services\Household\HouseholdService;
use Illuminate\Http\Request;

/**
 * Class HouseholdController
 *
 * @package App\Http\Controllers\Household
 */
class HouseholdController extends Controller
{
    /**
     * Household controller constructor
     * 
     * @param HouseholdService $householdService
     */
    public function __construct(
        public HouseholdService $householdService
    ) {
    }

    /**
     * Returns api response for Household ownership data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getHouseOwnershipData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getHouseOwnershipData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for Household roofing data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getRoofingData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getRoofingData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for Household foundation data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getFoundationData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getFoundationData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for house number data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getHouseNumberData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getHouseNumberData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for house number data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getRoadToHouseData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getRoadToHouseData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for house number data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getRoadTypeData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',',$request->ward) : [];
            return response()->json($this->householdService->getRoadTypeData($ward));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
