<?php

declare(strict_types=1);

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Services\Family\FamilyService;
use App\Services\Household\HouseholdService;
use App\Services\Individual\IndividualService;
use Illuminate\Http\Request;

/**
 * Class FamilyController
 *
 * @package App\Http\Controllers\Family
 */
class FamilyController extends Controller
{
    /**
     * FamilyController constructor
     */
    public function __construct(
        public FamilyService $familyService,
        public HouseholdService $householdService,
        public IndividualService $individualService
    )
    {
    }

    /**
     * Returns api response category family summary stats
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getSummaryStats(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];

            $data['total_family']        = $this->householdService->getTotalHouseholdCount($ward);
            $data['househead_gender']  = $this->householdService->getHouseHeadGender($ward);

            return response()->json(prepareResponseFormat($data));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response category family summary stats
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getHouseCount(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];
            $response = prepareResponseFormat($this->householdService->getHouseholdHouseCount($ward));
            return response()->json($response);
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response family income sources
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getIncomeSource(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->householdService->getIncomeSource($request->all()));
            return response()->json($response);
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response family income subsistence
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getIncomeSubsistence(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getIncomeSubsistence($ward)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response family land used for agriculture
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getAgriLandData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getAgriLandData($ward)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response family bank account
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getBankingData(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getBankingData($ward)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response family bank account
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getLivestocks(Request $request)
    {
        try {
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getLivestocks($ward)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
