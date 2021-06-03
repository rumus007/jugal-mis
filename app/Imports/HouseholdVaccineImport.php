<?php

namespace App\Imports;

use App\Models\Household\Household;
use App\Models\Household\HouseholdVaccine;
use App\Models\Household\Vaccine;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseholdVaccineImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        HouseholdVaccine::truncate();
        $vaccine = Vaccine::get();

        foreach ($collection as $row) {
            $data = $row->toArray();
            try {
                $temp = Household::where('id', $data['index'])->first();
                if ($temp) {
                    // sync the vaccine id in pivot table
                    $arr = $this->getVaccine($vaccine, $data);
                    $temp->householdVaccine()->sync($arr);
                }
            } catch (\Exception $e) {
                logger($e->getMessage());
                continue;
            }
        }
    }

    private function getVaccine($vaccine, $data): array
    {
        $id = [];

        $map = [
            "bsaja" => 'bcg',
            "dapata" => 'dpt',
            "hapataitasa_b" => 'hepatitis_b',
            "hapataitasa_inafalnaja_b" => 'hepatitis_influenza',
            "polio_makhabta" => 'polio_oral',
            "polio_saiibta" => 'polio_syringe',
            "hatapail_saii" => 'lymphatic_filariasis',
            "thathara_nprbl_saii" => 'tetanus',
            "thhanasatakara" => 'measle_rubella',
            "namanaya_khapa" => 'pneumonia',

        ];

        foreach ($map as $key => $value) {
            $temp = $vaccine->where('name', trim($value))->first()?->id;
            if ($data[$key] && $temp) {
                $id[] = $temp;
            }
        }

        return $id;
    }
}
