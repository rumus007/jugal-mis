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
                $avg_income = (int) $data['paravaraka_sarathara_brashhaka_aamathana_kata_chha_ra_ma_ullkha_garana'];
                $avg_expenditure = (int) $data['paravaraka_sarathara_brashhaka_kharaca_kata_chha_ra_ma_ullkha_garana'];
                $avg_saving = $avg_income - $avg_expenditure;
                Household::create([
                    'id'                                => $data['index'],
                    'province'                          => $data['parathasha_na'],
                    'district'                          => $data['jallka_nama'],
                    'locallevel'                        => $data['sathanaya_tahaka_nama'],
                    'locallevel_code'                   => $data['sathanaya_tahaka_kada'],
                    'ward'                              => getEnglishNumber($data['vada_na']),
                    'tole'                              => $data['vasatatalka_nama'],
                    'tole_misc'                         => $data['vasatatalka_nama_anaya_bhae_ullkha_garanahasa'],
                    'street_name'                       => $data['maragaka_nama'],
                    "family_head_name"                  => $data['gharamalka_nama_thara'],
                    "family_head_gender"                => $data['lnaga'],
                    "family_head_age"                   => (int) $data['umara'],
                    'has_house_number'                  => $data['ghara_namabra_chhachhana'] == 'छ' ? true : false,
                    'house_number'                      => $data['ghara_namabra_ullkha_garanahal'],
                    'type_of_access_to_road'            => $data['ghara_pagana_btasadakaka_parakara'],
                    'type_of_road'                      => $data['ghara_pagana_btasadakaka_satara'],
                    "house_count"                       => (int) $data['tapaiika_yasa_gaunagarapalka_bhatara_kata_vata_ghara_chha'],
                    // "no_of_rooms" => $data[''],
                    // "no_of_rented_rooms" => $data[''],
                    'house_ownership'                   => $data['tapaii_hal_bsaka_gharaka_savamatava_kasata_parakaraka_ha'],
                    'roofing'                           => $data['tapaii_bsabsa_garana_gharaka_chhanaka_parakara'],
                    'roofing_misc'                      => $data['chhanaka_parakara_anaya_bhae_ullkha_garanahasa'],
                    'foundation'                        => $data['tapaii_bsaka_gharaka_jaga_kasata_parakaraka_chha'],
                    'foundation_misc'                   => $data['gharaka_jaga_anaya_bhae_ullkha_garanahasa'],
                    "drinking_water"                    => $data['khanapanaka_makhaya_sarata_ka_ha'],
                    "drinking_water_misc"               => $data['khanapanaka_sarata_anaya_bhae_ullkha_garanahasa'],
                    "cooking_fuel"                      => $data['khana_pakauna_parayaga_garana_makhaya_inathhana_kana_ha'],
                    "cooking_fuel_misc"                 => $data['khana_pakauna_inathhana_anaya_bhae_ullkha_garanahasa'],
                    "main_electricity_source"           => $data['paravaral_parayaga_garana_btataka_makhaya_sharata_kana_ha'],
                    "alternative_electricity_source"    => $data['btataka_sharata_anaya_bhae_ullkha_garanahasa'],
                    "distance_to_basic_healthcare"      => $data['aathharabhata_savasathaya_sava_lna_kata_hadana_parachha'],
                    "is_earthquake_resistant"           => $data['tapaii_bsaka_ghara_bhakamapa_paratarathha_chha'] == 'छ' ? true : false,
                    "has_risk_mitigation_plans"         => $data['tapaiika_ghara_paravaraka_jakhama_paravaraka_yajana_bnaka_chha'] == 'छ' ? true : false,
                    "vulnerable_to_national_disaster"   => $data['tapaika_ghara_parakataka_parakapaka_jakhamama_chha'] == 'छ' ? true : false,
                    "toilet_facility"                   => $data['paravaral_parayaga_garana_shacalya_kasata_parakaraka_chha'],
                    "family_member_count"               => $data['paravara_sakhaya_gharamal_sahata'],
                    // "is_income_enough" => $data[''],
                    "avg_family_income"                 => $avg_income,
                    "avg_family_expenditure"            => $avg_expenditure,
                    "avg_family_saving"                 => $avg_saving,
                    "subsistence_of_income"             => $data['aafana_utapathanaaamathanal_tapaiika_paravaralii_kata_mahana_khana_pagachha'],
                    "has_bank_account"                  => $data['paravaraka_kana_sathasayaka_vaka_tatha_vatataya_sasathama_khata_chhachhana'] == 'छ' ? true : false,
                    "use_of_family_lang_agriculture"    => $data['paravaral_kashha_karayaka_lga_jagaga_parayaga_garaka_chha'] == 'छ' ? true : false,
                    "livestock"                         => $data['tapaiika_paravaral_kana_capaya_tatha_pashapakashha_palnabhaeka_chha'] == 'छ' ? true : false,
                    "fish_honeybee_silkworm"            => $data['tapaiika_paravarama_machha_mara_ra_rashamapalna_garanabhaeka_chha'] == 'छ' ? true : false,
                    'geo_code'                          => $data['gharaka_jayakada'],
                    'geo_latitude'                      => $data['gharaka_jayakada_latitude'],
                    'geo_longitude'                     => $data['gharaka_jayakada_longitude'],
                    'geo_altitude'                      => $data['gharaka_jayakada_altitude'],
                    'geo_precision'                     => $data['gharaka_jayakada_precision'],
                    'photo'                             => $data['gharaka_fata'],
                ]);
            } catch (\Exception $e) {
                logger($e->getMessage());
                continue;
            }
        }
    }
}
