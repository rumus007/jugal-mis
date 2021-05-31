<?php

namespace App\Imports;

use App\Models\Household\Household;
use App\Models\Individual\Individual;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseheadImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $data = $row->toArray();
            // dd($data);
            if (Household::where('id', $data['index'])->first()) {


                $trainings = [
                    'technology' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_sacana_tatha_paravathha_ilkatarakal_ra_ilkataranakasa_kamapayatara_vathayata_mavaiil_radaya_ghada_aatha'] ? true : false,
                    'tailor_boutique' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_salii_bnaii_btaka_sagara_paralra_aatha'] ? true : false,
                    'construction' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_naramanae_samabnathha_mayasana_karapanatara_aatha'] ? true : false,
                    'engineering' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_iniajanayaranaga_atamavail_ra_makanakasa'] ? true : false,
                    'agricultural' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kashha_samabnathha_jata_jataera_khathaya_parasathhana_aatha'] ? true : false,
                    'public_health' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_janasavasathaya_samabnathha'] ? true : false,
                    'animal_health' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_pashasavasathaya_samabnathha'] ? true : false,
                    'forestry' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_vana_samabnathha'] ? true : false,
                    'tourism' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_parayatana_tara_gaida_tarabhal_ra_satakara'] ? true : false,
                    'art' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kal_samabnathha'] ? true : false,
                    'other' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_anaya'] ? true : false,
                    'none' => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kana_pana_chhana'] ? true : false
                ];

                $identifications = [
                    'citizenship' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_nagarakata'] ? true : false,
                    'poverty_id' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_garab_paracayapatara'] ? true : false,
                    'senior_citizen_id' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_jashhatha_nagaraka_paracayapatara'] ? true : false,
                    'single_female_id' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_ekal_mahal_paracayapatara'] ? true : false,
                    'national_id' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_rashhataraya_paracayapatara'] ? true : false,
                    'dont_know' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_thaha_chhana'] ? true : false,
                    'none' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_chhana'] ? true : false,
                    'driver_license' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_savara_calka_ijajata_patara'] ? true : false,
                    'voter_id' => $data['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_matathata_paracaya_patara'] ? true : false,

                ];

                $common = [
                    'typhoid' => $data['samanaya_raga_bhae_raga_chhananahasajavarataifaida'] ? true : false,
                    'diarrhoea' => $data['samanaya_raga_bhae_raga_chhananahasajhadapakhalbnata'] ? true : false,
                    'jaundice' => $data['samanaya_raga_bhae_raga_chhananahasajanadasa'] ? true : false,
                    'limb_fall' => $data['samanaya_raga_bhae_raga_chhananahasaaaga_khasana'] ? true : false,
                    'pneumonia' => $data['samanaya_raga_bhae_raga_chhananahasanamanaya'] ? true : false,
                    'other' => $data['tharagha_raga_bhae_raga_chhananahasa'] ? true : false,
                ];

                $chronic = [
                    'heart_related' => $data['tharagha_raga_bhae_raga_chhananahasamata_samabnathha_raga'] ? true : false,
                    'cancer' => $data['tharagha_raga_bhae_raga_chhananahasakayanasara'] ? true : false,
                    'tuberculosis' => $data['tharagha_raga_bhae_raga_chhananahasakashhayaraga'] ? true : false,
                    'respiratory' => $data['tharagha_raga_bhae_raga_chhananahasashavasaparashasa_samabnathha_raga'] ? true : false,
                    'diabetes' => $data['tharagha_raga_bhae_raga_chhananahasamathhamaha'] ? true : false,
                    'hiv_aids' => $data['tharagha_raga_bhae_raga_chhananahasaecaaaiibha_edasa'] ? true : false,
                    'high_blood_pressure' => $data['tharagha_raga_bhae_raga_chhananahasaucaca_rakatacapablda_parasara'] ? true : false,
                    'kidney_related' => $data['tharagha_raga_bhae_raga_chhananahasamagal_samabnathha_raga'] ? true : false,
                    'malnutrition' => $data['tharagha_raga_bhae_raga_chhananahasakapashhanae'] ? true : false,
                    'brain_related' => $data['tharagha_raga_bhae_raga_chhananahasamasatashhaka'] ? true : false,
                    'other' => $data['tharagha_raga_bhae_raga_chhananahasaanaya'] ? true : false,
                ];

                Individual::create([
                    "household_id" => $data['index'],
                    "full_name" => $data['gharamalka_nama_thara'],
                    "gender" => $data['lnaga'],
                    "age" => $data['umara'],
                    "age_group" => $data['umaraka_ikaii_chhananahasa'],
                    "religion" => $data['thharama'],
                    "religion_other" => $data['thharama_anaya_bhae_ullkha_garanahasa'],
                    "mother_tongue" => $data['matabhashha'],
                    "mother_tongue_other" => $data['matabhashha_anaya_bhae_ullkha_garanahasa'],
                    "caste" => $data['jata_chhananahasa'],
                    "caste_other" => $data['jata_anaya_bhae_ullkha_garanahasa'],
                    "education_level" => $data['shakashhakasatara'],
                    "domicile_status" => $data['bsabsaka_avasatha'],
                    "employment_status" => $data['pasha'],
                    "employment_other" => $data['pasha_anaya_bhae_ullkha_garanahasa'],
                    "martial_status" => $data['vavahaka_sathata'],
                    "in_different_district" => trim($data['bsabsaka_avasatha']) == 'स्वदेशमा अन्यत्र बसेको' ? true : false,
                    "location_district" => $data['savathashama_anayatara_bsaka_jall_chhananahasa'],
                    "in_foreign_country" => trim($data['bsabsaka_avasatha']) == 'विदेशमा बसेको' ? true : false,
                    "foreign_country" => $data['vathashama_bsaka_thasha_chhananahasa'],
                    "disability_status" => $data['apanagataka_sathata'],
                    "disability_identification" => $data['apanagataka_kana_paracayapatara_lnabhaeka_chha'],
                    "health_status" => $data['savasathaya_avasatha'],
                    "relationship_to_family_head" => "घरमुली",
                    "training_taken" => $data['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha'],
                    "trainings" => json_encode($trainings),
                    "identifications" => json_encode($identifications),
                    "chronic_disease" => json_encode($chronic),
                    "common_disease" => json_encode($common),
                    'common_disease_other' => $data['samanaya_raga_anaya_bhaema_ullkha_garanahasa'],
                    'chronic_disease_other' => $data['tharagha_raga_anaya_bhaema_ullkha_garanahasa'],
                    "created_at" => new DateTime,
                    "updated_at" => new DateTime,
                ]);
            }
        }
    }
}
