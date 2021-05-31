<?php

namespace App\Imports;

use App\Models\Household\Household;
use App\Models\Household\HouseholdFishBeeSilkworm;
use App\Models\Household\HouseholdLivestock;
use App\Models\Household\Livestock;
use DateTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseholdLivestockImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        HouseholdLivestock::truncate();
        HouseholdFishBeeSilkworm::truncate();
        $livestocks = Livestock::get();

        foreach ($collection as $row) {
            $data = $row->toArray();
            $per_household = [];
            $per_household_bee = [];
            $household = Household::where('id', $data['index'])->first();

            if (is_null($household)) {
                continue;
            }

            if ($data['tapaiika_paravaral_kana_capaya_tatha_pashapakashha_palnabhaeka_chha'] == 'छ') {
                //import livestock data 
                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_gaigarabcachhabcachha']) {
                    //for cow
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'cow')->first()->id,
                        "number_of_livestock" => $data['gaigarabcachhabcachhaka_sakhaya'],
                        "milk_production_ltr" => $data['gaigara_varashhaka_thathha_utapathanaltara'],
                        "meat_production_kg" => null,
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => null,
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['gaigara_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_ragabhasapadapada']) {
                    //for buffalo
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'buffalo')->first()->id,
                        "number_of_livestock" => $data['ragabhasapadapadaka_sakhaya'],
                        "milk_production_ltr" => $data['ragabhasa_varashhaka_thathha_utapathanaltara'],
                        "meat_production_kg" => $data['ragabhasa_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => $data['ragabhasa_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['ragabhasa_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_bkharakhasabkacayagara']) {
                    //for goat
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'goat')->first()->id,
                        "number_of_livestock" => $data['bkharakhasabkaka_sakhaya'],
                        "milk_production_ltr" => $data['bkhara_varashhaka_thathha_utapathanaltara'],
                        "meat_production_kg" => $data['bkhara_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => $data['bkhara_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['bkhara_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_bhada']) {
                    //for sheep
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'sheep')->first()->id,
                        "number_of_livestock" => $data['bhadaka_sakhaya'],
                        "milk_production_ltr" => $data['bhada_varashhaka_thathha_utapathanaltara'],
                        "meat_production_kg" => $data['bhada_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => $data['bhada_varashhaka_una_utapathana_kaja'],
                        "bone_skin_production_kg"  => $data['bhada_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue"  => $data['bhada_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_sagaravagara']) {
                    //for pig
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'pig')->first()->id,
                        "number_of_livestock" => $data['sagaravagaraka_sakhaya'],
                        "milk_production_ltr" => null,
                        "meat_production_kg" => $data['sagaravagara_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg" => $data['sagaravagara_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['sagaravagara_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_kakharahasa']) {
                    //for chicken and duck
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'duck_chicken')->first()->id,
                        "number_of_livestock" => $data['kakharahasaka_sakhaya'],
                        "milk_production_ltr" => null,
                        "meat_production_kg" => $data['kakharahasa_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => $data['kakharahasa_hadachhalkaja'],
                        "egg_production_kg"  => $data['kakharahasa_varashhaka_anaeda_utapathana_sakhaya'],
                        "total_revenue" => $data['kakharahasa_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_ghadakhacacada']) {
                    //for horse mule
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'horse_mule')->first()->id,
                        "number_of_livestock" => $data['ghadakhacacadajhapaka_sakhaya'],
                        "milk_production_ltr" => null,
                        "meat_production_kg" => null,
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => null,
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['ghada_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_yakacara']) {
                    //for yak
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'yak')->first()->id,
                        "number_of_livestock" => $data['yakacaraka_sakhaya'],
                        "milk_production_ltr" => $data['yakacara_varashhaka_thathha_utapathanaltara'],
                        "meat_production_kg" => $data['yakacara_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => $data['yakacara_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['yakacara_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                if ($data['namana_kana_capaya_tatha_pashapakashhahara_palnabhaeka_chha_kharaya']) {
                    //for rabbit
                    $per_household[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'rabbit')->first()->id,
                        "number_of_livestock" => $data['kharayaka_sakhaya'],
                        "milk_production_ltr" => null,
                        "meat_production_kg" => $data['kharaya_varashhaka_masa_utapathana_kaja'],
                        "wool_production_kg" => null,
                        "bone_skin_production_kg"  => $data['kharaya_hadachhalkaja'],
                        "egg_production_kg"  => null,
                        "total_revenue" => $data['kharaya_vakarabta_brashhaka_aamathana_ra'],
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime,
                    ];
                }

                HouseholdLivestock::insert($per_household);
            }

            if ($data['tapaiika_paravarama_machha_mara_ra_rashamapalna_garanabhaeka_chha'] == 'छ') {
                //for fish bee silk worm
                if ($data['machha_mara_ra_rashamapalna_mathhaya_ka_ka_palna_garanabhaeka_chha_machha']) {
                    //for fish
                    $per_household_bee[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'fish')->first()->id,
                        "total_fish_ponds" => $data['machhapalna_garaka_pakhara_sakhaya'],
                        "area_fish_pond" => $data['machhapalna_pakharaka_kashhatarafal'],
                        "area_fish_pond_unit" => $data['machhapalna_garaeka_kashhatarafalka_ikaii'],
                        "fish_production_kg" => $data['brashhaka_machha_utapathana_kaja'],
                        "total_revenue" => null,
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime
                    ];
                }

                if ($data['machha_mara_ra_rashamapalna_mathhaya_ka_ka_palna_garanabhaeka_chha_mara']) {
                    //for bee
                    $per_household_bee[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'honeybee')->first()->id,
                        "total_honeybee_home" => $data['mara_ghara_sakhaya'],
                        "honey_production_kg" => $data['brashhaka_maha_utapathana_kaja'],
                        "total_revenue" => null,
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime
                    ];
                }

                if ($data['machha_mara_ra_rashamapalna_mathhaya_ka_ka_palna_garanabhaeka_chha_rashama']) {
                    //for silkworm
                    $per_household_bee[] = [
                        "household_id" => $household->id,
                        "livestock_id" => $livestocks->where('name', 'silkworm')->first()->id,
                        "total_silkworm_koyo" => $data['rashamakhata_kaya_sakhaya'],
                        "silk_production_kg" => $data['brashhaka_rashama_utapathana_kaja'],
                        "total_revenue" => null,
                        "created_at" => new DateTime,
                        "updated_at" => new DateTime
                    ];
                }

                HouseholdFishBeeSilkworm::insert($per_household_bee);
            }
        }
    }
}
