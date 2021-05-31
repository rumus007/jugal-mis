<?php

namespace App\Imports;

use App\Models\Household\AgriProduct;
use App\Models\Household\Household;
use App\Models\Household\HouseholdAgriProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseholdAgriImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        HouseholdAgriProduct::truncate();
        $agri_product = AgriProduct::get();

        foreach ($collection as $row) {
            $data = $row->toArray();
            try {
                if ($data["namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chha"]) {
                    $temp = Household::where('id', $data['index'])->first();
                    if ($temp) {
                        // sync the agricultural product id in pivot table
                        $agri_arr = $this->getAgriProduct($agri_product, $data);
                        $temp->householdAgriProduct()->sync($agri_arr);
                    }
                }
            } catch (\Exception $e) {
                logger($e->getMessage());
                continue;
            }
        }
    }

    private function getAgriProduct($agri_product, $data): array
    {
        $id = [];

        $map = [
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhathhana" => "धान",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhamaka" => "मकै",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhagaha" => "गहुँ",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaaal" => "आलु",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaja" => "जौ",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakatha" => "कोदो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhafapara" => "फापर",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhauva" => "उवा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhathal" => "दाल",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chharahara" => "रहर",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhamasara" => "मुसरो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhacana" => "चना",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasama" => "सिमी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabhatatamasa" => "भट्टमास",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chharajama" => "राजमा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhava" => "वोड़ी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhagahata" => "गहत",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhamasa" => "मास",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakarau" => "केराउ",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhatarasasaraya" => "तोरी/सस्र्यु",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaaalsatal" => "आलस/तिल",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasarayamakha" => "सूर्यमुखी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasalma" => "सिलाम",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabnathakaulraya" => "बन्दा/काउली/रायो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabda" => "बोडी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhagalbhada" => "गोलभेंडा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakakaralkafarasa" => "काँक्रो,लौका,फर्सी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaparablkanatharakakakara" => "परबल,कुन्द्रुक,काँक्रो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakaralgharalcacanaeda" => "करेला,घिरौला,चिचिण्डो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhamal" => "मुला",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakharasana" => "खोर्सानी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabtha" => "बेथे",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabhanada" => "भिन्डि",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakamaca" => "किम्ची",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaathavavasara" => "अदुवा/वेसार",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhapayajalsana" => "प्याज/लसुन",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhacayau" => "च्याउ",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakafa" => "कफी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhacaya" => "चिया",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaalca" => "अलैंची",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaaapalca" => "आँप/लिची",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaukha" => "उखु",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakaramava" => "केरा/मेवा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasanatalkagata_amaljata" => "सुन्तला/कागती (अमिलोेजात)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasayauaaravakhada" => "स्याउ/आरुवखडा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhanasapata" => "नास्पाति",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaaamab" => "आम्बा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaanara" => "अनार",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakava" => "किवी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakharapana" => "खुर्पानी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaokhara" => "ओखर",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhajanara" => "जुनार",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakatahara" => "कटहर",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhatatapata_jadavata" => "तितेपाती (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhapataraka_jadavata" => "पुट्रकी (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhagaraja_jadavata" => "गुर्जो (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhajatamasa_jadavata" => "जटामसी (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhanaramasa_jadavata" => "निर्मसी (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhapacaoul_jadavata" => "पांचऔले (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhayarasagamava_jadavata" => "यार्सागुम्वा (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhacaraiita_jadavata" => "चिराईतो (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabnalsana_jadavata" => "बनलसुन (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasaljata_jadavata" => "सिलाजित (जडीवुटी)",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhajhayal" => "झयाल",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabhatakasha" => "भुतकेश",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabhajapatara" => "भोजपत्र",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhathalcana" => "दलिचिनी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhapashhanaevatha" => "पाषणवेद",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasakakaii" => "सिकाकाई",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhathhapapata" => "धुपिपात",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhabhalma" => "भलामी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakakadasaga" => "काँकडसिगी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhasatava" => "सतुवा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaunaya" => "उन्यु",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakarakal" => "कर्कलो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakataka" => "कुटकी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaamal" => "अमला",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaiinatharanae" => "ईन्द्रेणी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakasa" => "काँस",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhakafalbkara" => "काफलबोक्रा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaasara" => "असुरो",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhavajarathanata" => "वज्रदन्ती",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaaakharabkara" => "आोखरबोक्रा",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaagara" => "अंगरी",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhalthasall" => "लौठसल्ला",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhavanalsana" => "वनलसुन",
            "namana_kana_kashha_upaja_utapathana_va_bkara_garanabhaeka_chhaganana" => "गनानी",
        ];

        foreach ($map as $key => $value) {
            $temp = $agri_product->where('name', trim($value))->first()?->id;
            if ($data[$key] && $temp) {
                $id[] = $temp;
            }
        }

        return $id;
    }
}
