<?php

declare(strict_types=1);

namespace App\Http\Controllers\Household;

use App\Http\Controllers\Controller;
use App\Services\Household\HouseholdService;
use App\Services\Individual\IndividualService;
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
     * @param IndividualService $individualService
     */
    public function __construct(
        public HouseholdService $householdService,
        public IndividualService $individualService
    ) {
    }

    /**
     * Returns api response category house summary stats
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

            $data['total_household']        = $this->householdService->getTotalHouseholdCount($ward);
            $data['total_population']       = $this->individualService->getTotalPop($request->all());
            $data['population_genderwise']  = $this->individualService->getGenderWise($request->all());

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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getHouseOwnershipData($params)));
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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getRoofingData($params)));
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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getFoundationData($params)));
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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getHouseNumberData($params)));
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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getRoadToHouseData($params)));
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
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getRoadTypeData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for total no of houses
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getHouseCount(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getHouseCount($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for total no of houses
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getRoomData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getRoomData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Returns api response for total no of houses
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getHouseListedData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getHouseListedData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for water source data
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getWaterSourceData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getWaterSourceData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for fuel source
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getFuelSourceData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getFuelSourceData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for main electricity source
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getElectricitySourceData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getElectricitySourceData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for alternate energy source
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getAlternateEnergyData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getAlternateEnergyData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for distance to receive basic healthcare
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getDistanceHealthData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getDistanceHealthData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for earthquake resistant
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getEarthquakeResistantData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getEarthquakeResistantData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for risk mitigation plans
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getRiskMitigationData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getRiskMitigationData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for toilet type
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getToiletTypeData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getToiletTypeData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for toilet availability
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getToiletData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getToiletData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for distance to fetch water
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getDistanceWaterData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getDistanceWaterData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for new born birthplace
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getBirthplaceData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getBirthplaceData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for vulnerability types
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getVulnerabilityData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getVulnerabilityData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for household facilities
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getFacilitiesData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getFacilitiesData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Returns api response for household waste mgmt
     *
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getWasteMgmtData(Request $request)
    {
        try {
            $params = $request->all();
            return response()->json(prepareResponseFormat($this->householdService->getWasteMgmtData($params)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
