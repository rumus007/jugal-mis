<?php

declare(strict_types=1);

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Services\Individual\IndividualService;
use Illuminate\Http\Request;

/**
 * Class IndividualController
 *
 * @package App\Http\Controllers\Individual
 */
class IndividualController extends Controller
{
    /**
     * IndividualController constructor
     * 
     * @param IndividualService $individualService
     */
    public function __construct(
        public IndividualService $individualService
    ) {
    }

    /**
     * Returns api response individual gender distribution data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getGenderData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getGenderWise($request->all()));
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
     * Returns api response individual ethnicity distribution data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getEthnicityData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getEthnicityData($request->all()));
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
     * Returns api response individual religion distribution data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getReligionData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getReligionData($request->all()));
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
     * Returns api response individual mother tongue data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getMotherTongueData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getMotherTongueData($request->all()));
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
     * Returns api response individual martial status data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getMaritalStatusData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getMaritalStatusData($request->all()));
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
     * Returns api response individual domicile status data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getDomicileStatusData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getDomicileStatusData($request->all()));
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
     * Returns api response education completed data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getEducationData(Request $request)
    {
        try {
            $response = prepareResponseFormat($this->individualService->getEducationData($request->all()));
            return response()->json($response);
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
