<?php

namespace App\Imports;

use App\Models\Household\Household;
use App\Models\Household\HouseholdHome;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HomeImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        HouseholdHome::truncate();

        foreach ($collection as $row) {
            $data = $row->toArray();

            if (Household::where('id', $data['parent_index'])->first()) {
                HouseholdHome::create([
                    "household_id" => $data['parent_index'],
                    "ward" => getEnglishNumber($data['ghara_kana_vada_ma_avasathata_chha']),
                    "no_of_rooms" => $data['tapaiika_gharama_jamama_kata_kathahara_chhana'],
                    "no_of_rented_rooms" => $data['kata_katha_bhadama_thana_bhaeka_chha'],
                    "naksa_pass" => $data['ka_tapaiil_gharanakasa_pasa_abhalkhakaranae_garana_bhaeka_chha'] == 'छ' ? true : false,
                ]);
            }
        }
    }
}
