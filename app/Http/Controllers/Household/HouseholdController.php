<?php

declare(strict_types=1);

namespace App\Http\Controllers\Household;

use App\Http\Controllers\Controller;
use App\Models\Household\HouseholdAgriProduct;
use App\Models\Household\HouseholdBirthplace;
use App\Models\Household\HouseholdDisastor;
use App\Models\Household\HouseholdFacilities;
use App\Models\Household\HouseholdFishBeeSilkworm;
use App\Models\Household\HouseholdHome;
use App\Models\Household\HouseholdIncomeSrc;
use App\Models\Household\HouseholdLandTitle;
use App\Models\Household\HouseholdLivestock;
use App\Models\Household\HouseholdWasteMgmt;
use App\Models\Household\HouseholdWaterDistance;
use App\Models\Individual\Individual;
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getHouseOwnershipData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getRoofingData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getFoundationData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getHouseNumberData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getRoadToHouseData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getRoadTypeData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getHouseCount($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getRoomData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getHouseListedData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getWaterSourceData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getFuelSourceData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getElectricitySourceData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getAlternateEnergyData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getDistanceHealthData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getEarthquakeResistantData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getRiskMitigationData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getToiletTypeData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getToiletData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getDistanceWaterData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getBirthplaceData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getVulnerabilityData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getFacilitiesData($ward)));
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
            $ward = $request->ward ? explode(',', $request->ward) : [];
            return response()->json(prepareResponseFormat($this->householdService->getWasteMgmtData($ward)));
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function test(Request $request)
    {
        $data = [];
        $type = $request->type;


        switch ($type) {
            case 'agri':
                dd(HouseholdAgriProduct::count());
                break;
            case 'facility':
                dd(HouseholdFacilities::count());
                break;
            case 'waste':
                dd(HouseholdWasteMgmt::count());
                break;
            case 'birthplace':
                dd(HouseholdBirthplace::count());
                break;
            case 'disastor':
                dd(HouseholdDisastor::count());
                break;
            case 'water':
                dd(HouseholdWaterDistance::count());
                break;
            case 'income':
                dd(HouseholdIncomeSrc::count());
                break;
            case 'land':
                dd(HouseholdLandTitle::count());
                break;
            case 'livestock':
                dd(HouseholdLivestock::count()); 
                break;    
            case 'bee':
                dd(HouseholdFishBeeSilkworm::count());
                break;    
            case 'family':
                dd(Individual::count());
                break;    
            case 'rooms':
                dd(HouseholdHome::count());
                break;   
        }
        dd('here');
    }
}
