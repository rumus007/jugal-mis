<?php

namespace App\Imports;

use App\Models\Household\Household;
use App\Models\Individual\Individual;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndividualImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        Individual::truncate();
        $grouped = $collection->groupBy('parent_index');
        foreach ($grouped as $key => $row) {
            $parent_id = $key;
            $data = $row->toArray();
            // dd($data);
            $toSave = [];
            if (Household::where('id', $parent_id)->first()) {
                foreach ($data as $members) {

                    $mobileNumber = $this->validateMobile($members['samaparaka_na']); 
                    $hasMobile = $mobileNumber ? true : false;
                    $telecom = $mobileNumber ? $this->telecomeData($mobileNumber) : null;

                    $trainings = [
                        'technology' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_sacana_tatha_paravathha_ilkatarakal_ra_ilkataranakasa_kamapayatara_vathayata_mavaiil_radaya_ghada_aatha'] ? true : false,
                        'tailor_boutique' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_salii_bnaii_btaka_sagara_paralra_aatha'] ? true : false,
                        'construction' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_naramanae_samabnathha_mayasana_karapanatara_aatha'] ? true : false,
                        'engineering' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_iniajanayaranaga_atamavail_ra_makanakasa'] ? true : false,
                        'agricultural' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kashha_samabnathha_jata_jataera_khathaya_parasathhana_aatha'] ? true : false,
                        'public_health' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_janasavasathaya_samabnathha'] ? true : false,
                        'animal_health' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_pashasavasathaya_samabnathha'] ? true : false,
                        'forestry' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_vana_samabnathha'] ? true : false,
                        'tourism' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_parayatana_tara_gaida_tarabhal_ra_satakara'] ? true : false,
                        'art' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kal_samabnathha'] ? true : false,
                        'other' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_anaya'] ? true : false,
                        'none' => $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha_kana_pana_chhana'] ? true : false
                    ];

                    $identifications = [
                        'citizenship' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_nagarakata'] ? true : false,
                        'poverty_id' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_garab_paracayapatara'] ? true : false,
                        'senior_citizen_id' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_jashhatha_nagaraka_paracayapatara'] ? true : false,
                        'single_female_id' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_ekal_mahal_paracayapatara'] ? true : false,
                        'national_id' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_rashhataraya_paracayapatara'] ? true : false,
                        'dont_know' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_thaha_chhana'] ? true : false,
                        'none' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_chhana'] ? true : false,
                        'driver_license' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_savara_calka_ijajata_patara'] ? true : false,
                        'voter_id' => $members['apanagata_bhaka_namana_kana_sarakara_paracayapatara_lnabhaeka_chha_matathata_paracaya_patara'] ? true : false,

                    ];

                    $common = [
                        'typhoid' => $members['samanaya_raga_bhae_raga_chhananahasajavarataifaida'] ? true : false,
                        'diarrhoea' => $members['samanaya_raga_bhae_raga_chhananahasajhadapakhalbnata'] ? true : false,
                        'jaundice' => $members['samanaya_raga_bhae_raga_chhananahasajanadasa'] ? true : false,
                        'limb_fall' => $members['samanaya_raga_bhae_raga_chhananahasaaaga_khasana'] ? true : false,
                        'pneumonia' => $members['samanaya_raga_bhae_raga_chhananahasanamanaya'] ? true : false,
                        'other' => $members['tharagha_raga_bhae_raga_chhananahasa'] ? true : false,
                    ];

                    $chronic = [
                        'heart_related' => $members['tharagha_raga_bhae_raga_chhananahasamata_samabnathha_raga'] ? true : false,
                        'cancer' => $members['tharagha_raga_bhae_raga_chhananahasakayanasara'] ? true : false,
                        'tuberculosis' => $members['tharagha_raga_bhae_raga_chhananahasakashhayaraga'] ? true : false,
                        'respiratory' => $members['tharagha_raga_bhae_raga_chhananahasashavasaparashasa_samabnathha_raga'] ? true : false,
                        'diabetes' => $members['tharagha_raga_bhae_raga_chhananahasamathhamaha'] ? true : false,
                        'hiv_aids' => $members['tharagha_raga_bhae_raga_chhananahasaecaaaiibha_edasa'] ? true : false,
                        'high_blood_pressure' => $members['tharagha_raga_bhae_raga_chhananahasaucaca_rakatacapablda_parasara'] ? true : false,
                        'kidney_related' => $members['tharagha_raga_bhae_raga_chhananahasamagal_samabnathha_raga'] ? true : false,
                        'malnutrition' => $members['tharagha_raga_bhae_raga_chhananahasakapashhanae'] ? true : false,
                        'brain_related' => $members['tharagha_raga_bhae_raga_chhananahasamasatashhaka'] ? true : false,
                        'other' => $members['tharagha_raga_bhae_raga_chhananahasaanaya'] ? true : false,
                    ];

                    $train = $members['vagata_brashhama_ka_kasata_vayavasayaka_sapa_talma_parapata_garanabhaeka_chha'];

                    $toSave[] = [
                        "household_id" => $members['parent_index'],
                        "full_name" => $members['sathasayaka_nama_thara'],
                        "gender" => $members['sathasayaka_lnaga'],
                        "age" => $members['umara'],
                        "age_group" => $members['umaraka_ikaii_chhananahasa'],
                        "religion" => $members['thharama'],
                        "religion_other" => $members['thharama_anaya_bhae_ullkha_garanahasa'],
                        "mother_tongue" => $members['matabhashha'],
                        "mother_tongue_other" => $members['matabhashha_anaya_bhae_ullkha_garanahasa'],
                        "caste" => $members['jata_chhananahasa'],
                        "caste_other" => $members['jatajata_anaya_bhae_ullkha_garanahasa'],
                        "education_level" => $members['shakashhakasatara'],
                        "domicile_status" => $members['bsabsaka_avasatha'],
                        "employment_status" => $members['pasha'],
                        "employment_other" => $members['pasha_anaya_bhae_ullkha_garanahasa'],
                        "martial_status" => $members['vavahaka_sathata'],
                        "in_different_district" => trim($members['bsabsaka_avasatha']) == 'स्वदेशमा अन्यत्र बसेको' ? true : false,
                        "location_district" => $members['savathashama_anayatara_bsaka_jall_chhananahasa'],
                        "in_foreign_country" => trim($members['bsabsaka_avasatha']) == 'विदेशमा बसेको' ? true : false,
                        "foreign_country" => $members['vathashama_bsaka_thasha_chhananahasa'],
                        "disability_status" => $members['apanagataka_sathata'],
                        "health_status" => $members['savasathaya_avasatha'],
                        "relationship_to_family_head" => $members['span_stylecolorredhh_member_fnamespan_gharamalka_ka_parana_hanachha'],
                        "training_taken" => is_null($train) ? null : ($train == 'कुनै पनि छैन' ? 'No' : 'Yes'),
                        "trainings" => json_encode($trainings),
                        "identifications" => json_encode($identifications),
                        "chronic_disease" => json_encode($chronic),
                        "common_disease" => json_encode($common),
                        'common_disease_other' => $members['samanaya_raga_anaya_bhaema_ullkha_garanahasa'],
                        'chronic_disease_other' => $members['tharagha_raga_anaya_bhaema_ullkha_garanahasa'],
                        "mobile_no" => $mobileNumber,
                        "has_mobile" => $hasMobile,
                        "telecom" => $telecom,
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                Individual::insert($toSave);
            }
        }
    }

    /**
     * Validate mobile number
     * 
     * @param $number
     * 
     * @return mixed
     */
    private function validateMobile($number)
    {
        return strlen($number) == 10 ? $number : null;
    } 

    /**
     * Get telecome provider from mobile number
     * 
     * @param $number
     * 
     * @return string
     */
    private function telecomeData($number): string
    {
        $firstThree = (int) substr($number, 0, 3);

        $ntc = [984, 985, 986];
        $ncell = [980, 981, 982];
        $ntc_cdma = [974, 975];
        $smart = [961, 962, 988];
        $utl = [972];
        $nepal_satellite = [963];

        if (in_array($firstThree, $ntc)) {
            return "NTC";
        }

        if (in_array($firstThree, $ncell)) {
            return "Ncell";
        }

        if (in_array($firstThree, $ntc_cdma)) {
            return "NTC CDMA";
        }

        if (in_array($firstThree, $smart)) {
            return "Smart Cell";
        }

        if (in_array($firstThree, $utl)) {
            return "UTL";
        }

        if (in_array($firstThree, $nepal_satellite)) {
            return "Nepal Satellite Telecom";
        }

        return "Others";
    }
}
