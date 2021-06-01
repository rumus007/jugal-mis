<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Household\HouseholdService;
use App\Services\Individual\IndividualService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * ResourceController Constructor
     * 
     */
    public function __construct(
        public HouseholdService $householdService,
        public IndividualService $individualService
    ) {
    }

    /**
     * Get stats for home page
     * 
     * @param Request $request
     *
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getSummaryStats(Request $request)
    {
        try {
            $youth      = $this->individualService->getYouthPopulation();
            $employed   = $this->individualService->getEmployedPopulation();
            $internet   = $this->householdService->getFacilitiesCount(['internet'])->first()?->count;

            $data['household_count']        = $this->householdService->getTotalHouseholdCount();
            $data['population_count']       = $this->individualService->getTotalPopulation();
            $data['youth_percentage']       = (float) number_format(($youth * 100) / $data['population_count'], 2);
            $data['employed_percentage']    = (float) number_format(($employed * 100) / $data['population_count'], 2);
            $data['internet_percentage']    = (float) number_format(($internet * 100) / $data['household_count'], 2);

            return response()->json(prepareResponseFormat($data),200);
        } catch (\Exception $e) {
            logger()->error($e);

            return response()->json([
                'status' => "Error",
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
