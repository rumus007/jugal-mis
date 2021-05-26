<?php

declare(strict_types=1);

namespace App\Imports;

use App\Constants\Enums;
use App\Models\Resource\Resource;
use App\Models\Resource\ResourceType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResourceImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $error_bag = [];
        Resource::truncate();
        $resource_types = ResourceType::select('id', 'name_np', 'name')->get();

        foreach ($collection as $row) {
            $data = $row->toArray();
            $type = $resource_types->where('name_np', trim($data['vashhayagatakashhatara_chhananahasa']))->first();

            try {
                if (!is_null($type)) {
                    Resource::create([
                        'resource_type_id' => $type?->id,
                        'province'         => $data['parathasha_na'],
                        'district'         => $data['jallka_nama'],
                        'locallevel'       => $data['sathanaya_tahaka_nama'],
                        'locallevel_code'  => $data['sathanaya_tahaka_kada'],
                        'ward'             => $this->getEnglishNumber($data['vada_na']),
                        'tole'             => $data['vasatatalka_nama'],
                        'tole_misc'        => $data['vasatatalka_nama_anaya_bhae_ullkha_garanahasa'],
                        'address'          => $data['thagana'],
                        'local_name'       => $data['nama'],
                        'contact_number'   => $data['samaparaka_na'],
                        'website'          => $data['vabsaiita'],
                        'geo_code'         => $data['jaya_kada'],
                        'geo_latitude'     => $data['jaya_kada_latitude'],
                        'geo_longitude'    => $data['jaya_kada_longitude'],
                        'geo_altitude'     => $data['jaya_kada_altitude'],
                        'geo_precision'    => $data['jaya_kada_precision'],
                        'photo'            => $data['photo'],
                        'metadata'         => json_encode($this->setMetadataResourceType($type->name, $data))
                    ]);
                }
            } catch (\Exception $e) {
                $error_bag[] = [
                    'error' => $e->getMessage()
                ];
                logger($e->getMessage());
                continue;
            }
        }
    }

    /**
     * Returns english equivalent of nepali number
     *
     * @param $number
     *
     * @return string
     */
    function getEnglishNumber($number) : string
    {
        $mapping = preg_split('//u', "०१२३४५६७८९", -1, PREG_SPLIT_NO_EMPTY);

        return str_replace($mapping, array_keys($mapping), $number);
    }

    /**
     * Create meta data json array for differnt resource type
     * 
     * @param $type
     * @param $data
     * 
     * @return Array
     */
    private function setMetadataResourceType($type, $data): array
    {
        switch ($type) {
            case 'cultural_heritage':
                $type_np = trim($data['sasakataka_samapathaka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
            case 'business_trade':
                return [
                    'owner_name'          => $data['vayavasaya_saniacalnakarataka_nama'],
                    'registration_number' => $data['vayavasaya_tharata_na'],
                    'ownership'           => $data['vayapara_tatha_vayavasayaka_savamatava']
                ];
                break;
            case 'natural_resource':
                $type_np = trim($data['parakataka_sharataka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
            case 'land_use':

                $type_of_land   = Enums::LAND_USE;
                $type_of_public = Enums::PUBLIC_AREA_TYPE;

                $type_np = trim($data['bha_upayagaka_parakara']);

                $temp =  [
                    'type_of_land_np' => $type_np,
                    'type_of_land'    => isset($type_of_land[$type_np]) ? $type_of_land[$type_np] : ''
                ];

                if ($temp['type_of_land'] == 'public') {
                    $public_type               = trim($data['saravajanaka_kashhataraka_parakara_chhananahasa']);
                    $temp['type_of_public_np'] = $public_type;
                    $temp['type_of_public']    = isset($type_of_public[$public_type]) ? $type_of_public[$public_type] : '';
                }

                if ($temp['type_of_land'] == 'vulnerable') {
                    $temp['vulnerable_flood']     = (int) $data['vapatha_tatha_savathanashal_kashhatarabdha'] ? true : false;
                    $temp['vulnerable_landslide'] = (int) $data['vapatha_tatha_savathanashal_kashhatarapahara'] ? true : false;
                    $temp['vulnerable_erosion']   = (int) $data['vapatha_tatha_savathanashal_kashhataranatha_katatana'] ? true : false;
                    $temp['vulnerable_duban']     = (int) $data['vapatha_tatha_savathanashal_kashhataradhabna'] ? true : false;
                    $temp['vulnerable_drought']   = (int) $data['vapatha_tatha_savathanashal_kashhatarasakhakha'] ? true : false;
                }

                return $temp;

                break;
            case 'ngo_club_group':
                $type_np = trim($data['gasasakalbsamahaka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
            case 'building':
                $condition         = Enums::CONDITION;
                $building_type     = Enums::BUILDING_TYPE;
                $building_category = Enums::BUILDING_CATEGORY;
                $condition_np      = trim($data['bhavanaka_avasatha']);
                $type_np           = trim($data['bhavanaka_parakara']);
                $category_np       = trim($data['bhavanaka_satara']);

                return [
                    'type_np'      => $type_np,
                    'type'         => isset($building_type[$type_np]) ? $building_type[$type_np] : '',
                    'condition_np' => $condition_np,
                    'condition'    => isset($condition[$condition_np]) ? $condition[$condition_np] : '',
                    'category_np'  => $category_np,
                    'category'     => isset($building_category[$category_np]) ? $building_category[$category_np] : ''
                ];
                break;
            case 'bridge_culvert':
                $condition    = Enums::CONDITION;
                $condition_np = trim($data['palpalsaka_avasatha']);
                $type_np      = trim($data['palpalsaka_parakara']);

                return [
                    'type'         => $type_np,
                    'condition_np' => $condition_np,
                    'condition'    => isset($condition[$condition_np]) ? $condition[$condition_np] : ''
                ];
                break;
            case 'industry_hydro':
                $ownership = Enums::INDUSTRY_OWNERSHIP;
                $type      = Enums::INDUSTRY_TYPE;
                $product   = Enums::INDUSTY_PRODUCT;

                $ownership_np     = $data['uthayagaka_savamatava'];
                $industry_type_np = $data['uthayagaka_parakara'];
                $product_np       = $data['utapathana_hana_vasata'];
                $temp = [
                    'ownership_np'     => $ownership_np,
                    'ownership'        => isset($ownership[$ownership_np]) ? $ownership[$ownership_np] : '',
                    'industry_type_np' => $industry_type_np,
                    'industry_type'    => isset($type[$industry_type_np]) ? $type[$industry_type_np] : '',
                    'product_np'       => $product_np,
                    'product'          => isset($product[$product_np]) ? $product[$product_np] : '',
                    'employed_men'     => (int) $data['parashha'],
                    'employed_women'   => (int) $data['mahal'],
                ];

                if ($temp['product'] == 'hydropower') {
                    $temp['generation_capacity_KW']    = $data['kalvatama'];
                    $temp['connected_to_natinal_grid'] = $data['rashhataraya_parasaranae_liinama_jadaeka_chhachhana'] == 'छ' ? true : false;
                }

                return $temp;
                break;
            case 'educational_institute':
                $edu_type = Enums::EDUCATIONAL_TYPE;
                $type_np  = trim($data['shakashhaka_sasathaka_parakara']);

                return [
                    'type_np' => $type_np,
                    'type'    => isset($edu_type[$type_np]) ? $edu_type[$type_np] : '',
                    'description' => $data['shakashhaka_sasathaka_vavaranae'],
                    'approved_appointment_female' => [
                        'pre_primary' => (int) $data['savakata_tharabnatha_mahal_parava_parathamaka'],
                        'basic'       => (int) $data['savakata_tharabnatha_mahal_aathharabhata'],
                        'secondary'   => (int) $data['savakata_tharabnatha_mahal_mathhayamaka']
                    ],
                    'approved_appointment_male' => [
                        'pre_primary' => (int) $data['savakata_tharabnatha_parashha_parava_parathamaka'],
                        'basic'       => (int) $data['savakata_tharabnatha_parashha_aathharabhata'],
                        'secondary'   => (int) $data['savakata_tharabnatha_parashha_mathhayamaka']
                    ],
                    'appointed_teacher_female' => [
                        'pre_primary' => (int) $data['karayarata_shakashhaka_mahal_parava_parathamaka'],
                        'basic'       => (int) $data['karayarata_shakashhaka_mahal_aathharabhata'],
                        'secondary'   => (int) $data['karayarata_shakashhaka_mahal_mathhayamaka']
                    ],
                    'appointed_teacher_male' => [
                        'pre_primary' => (int) $data['karayarata_shakashhaka_parashha_parava_parathamaka'],
                        'basic'       => (int) $data['karayarata_shakashhaka_parashha_aathharabhata'],
                        'secondary'   => (int) $data['karayarata_shakashhaka_parashha_mathhayamaka']
                    ],
                    'students_female' => [
                        'pre_primary' => (int) $data['vathharatha_sakhaya_mahal_parava_parathamaka'],
                        'basic'       => (int) $data['vathharatha_sakhaya_mahal_aathharabhata'],
                        'secondary'   => (int) $data['vathharatha_sakhaya_mahal_mathhayamaka']
                    ],
                    'students_male' => [
                        'pre_primary' => (int) $data['vathharatha_sakhaya_parashha_parava_parathamaka'],
                        'basic'       => (int) $data['vathharatha_sakhaya_parashha_aathharabhata'],
                        'secondary'   => (int) $data['vathharatha_sakhaya_parashha_mathhayamaka']
                    ],
                ];
                break;
            case 'health_institute':
                $health_type = Enums::HEALTH_TYPE;
                $type_np = trim($data['savasathaya_sasathaka_parakara']);

                return [
                    'type_np' => $type_np,
                    'type' => isset($health_type[$type_np]) ? $health_type[$type_np] : '',
                    'doctors_appointed'                  => (int) $data['cakatasaka_sakhaya_tharavanatha'],
                    'doctors_alloted'                    => (int) $data['cakatasaka_sakhaya_karayarata'],
                    'health_workers_appointed'           => (int) $data['anaya_savasathayakaramaka_sakhaya_tharavanatha'],
                    'health_workers_alloted'             => (int) $data['anaya_savasathayakaramaka_sakhaya_karayarata'],
                    'facility_maternity_service'         => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhaparasata_sava'] ? true : false,
                    'facility_lab'                       => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhalyab'] ? true : false,
                    'facility_clinic'                    => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhakalnaka'] ? true : false,
                    'facility_xray_service'              => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhaekasara_sava'] ? true : false,
                    'facility_vaccine_service'           => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhakhapa_sava'] ? true : false,
                    'facility_sct'                       => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhaesasata'] ? true : false,
                    'facility_consulting_service'        => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhaparamarasha_sava'] ? true : false,
                    'facility_safe_maternity_service'    => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathhasarakashhata_matatava_sava'] ? true : false,
                    'facility_blood_transfusion_service' => (int) $data['savasathaya_sasathama_upalbthha_sava_tatha_savathharakata_sacara_sava'] ? true : false,
                ];
                break;
            case 'hotel_resort_homestay':
                $type_np = trim($data['hatalrasarataka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
            case 'bank_financial':
                $type_np = trim($data['bka_tatha_vatataya_sasathaka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
            case 'security_agency':
                $type_np = trim($data['sarakashha_nakayaka_parakara']);

                return [
                    'type' => $type_np,
                ];
                break;
        }
    }
}
