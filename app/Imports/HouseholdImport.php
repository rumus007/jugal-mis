<?php

namespace App\Imports;

use App\Models\Household\Household;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseholdImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        Household::truncate();
        foreach ($collection as $row) {
            $data = $row->toArray();

            try {
                Household::create([
                    'index' => $data['index'],
                    'province' => $data['parathasha_na'],
                    'district' => $data['jallka_nama'],
                    'locallevel' => $data['sathanaya_tahaka_nama'],
                    'locallevel_code' => $data['sathanaya_tahaka_kada'],
                    'ward' =>  getEnglishNumber($data['vada_na']),
                    'tole' => $data['vasatatalka_nama'],
                    'tole_misc' => $data['vasatatalka_nama_anaya_bhae_ullkha_garanahasa'],
                    'street_name' => $data['maragaka_nama'],
                    'has_house_number' => $data['ghara_namabra_chhachhana'] == 'छ' ? true : false,
                    'house_number' => $data['ghara_namabra_ullkha_garanahal'],
                    'type_of_access_to_road' => $data['ghara_pagana_btasadakaka_parakara'],
                    'type_of_road' => $data['ghara_pagana_btasadakaka_satara'],
                    'house_ownership' => $data['tapaii_hal_bsaka_gharaka_savamatava_kasata_parakaraka_ha'],
                    'roofing' => $data['tapaii_bsabsa_garana_gharaka_chhanaka_parakara'],
                    'roofing_misc' => $data['chhanaka_parakara_anaya_bhae_ullkha_garanahasa'],
                    'foundation' => $data['tapaii_bsaka_gharaka_jaga_kasata_parakaraka_chha'],
                    'foundation_misc' => $data['gharaka_jaga_anaya_bhae_ullkha_garanahasa'],
                    'geo_code' => $data['gharaka_jayakada'],
                    'geo_latitude' => $data['gharaka_jayakada_latitude'],
                    'geo_longitude' => $data['gharaka_jayakada_longitude'],
                    'geo_altitude' => $data['gharaka_jayakada_altitude'],
                    'geo_precision' => $data['gharaka_jayakada_precision'],
                    'photo' => $data['gharaka_fata'],
                ]);
            } catch (\Exception $e) {
                logger($e->getMessage());
                continue;
            }
        }
    }
}
