<?php

namespace App\Http\Controllers;

use App\Models\Localizations;
use Illuminate\Http\Request;
use App\Models\Accommodations;
use App\Models\Descriptions;
use App\Models\Rates;

class ReadXMLController extends Controller
{
    public function index(Request $req)
    {

        //truncate das tabelas

        \DB::table('accommodations')->truncate();
        echo "accommodations apagada<br>";
        \DB::table('descriptions')->truncate();
        echo "descriptions apagada<br>";
        \DB::table('rates')->truncate();
        echo "rates apagada<br>";
        \DB::table('localizations')->truncate();
        echo "localizations apagada<br>";

            $accommodationsXML = file_get_contents(public_path('xml/Accommodations.xml'));
            $accommodationsObj = simplexml_load_string($accommodationsXML);
            $accommodationsJson = json_encode($accommodationsObj);
            $accommodationsArray = json_decode($accommodationsJson, true);

            $descriptionsXML = file_get_contents(public_path('xml/Descriptions.xml'));
            $descriptionsObj = simplexml_load_string($descriptionsXML);
            $descriptionsJson = json_encode($descriptionsObj);
            $descriptionsArray = json_decode($descriptionsJson, true);

            $ratesXML = file_get_contents(public_path('xml/Rates.xml'));
            $ratesObj = simplexml_load_string($ratesXML);
            $ratesJson = json_encode($ratesObj);
            $ratesArray = json_decode($ratesJson, true);

            //dd($ratesArray);


        if(count($ratesArray['AccommodationList']['Accommodation']) > 0){

            $dataArray = array();

            foreach($ratesArray['AccommodationList']['Accommodation'] as $index => $data){

                $rates = json_encode($data['Rates']);
                $vat = json_encode($data['VAT']);

                $dataArray[] = [
                    "AccommodationId" => $data['AccommodationId'],
                    "Capacity" => $data['Capacity'],
                    "Rates" => $rates,
                    "VAT" => $vat,
                ];
            }

            Rates::insert($dataArray);

            echo "Rates importadas!<br>";
        }

        if(count($descriptionsArray['Accommodation']) > 0){

            $dataArray = array();

            foreach($descriptionsArray['Accommodation'] as $index => $data){

                $internationalizedItem = json_encode($data['InternationalizedItem']);
                $pictures = json_encode($data['Pictures']);

                $dataArray[] = [
                    "AccommodationId" => $data['AccommodationId'],
                    "Pictures" => $pictures,
                    "InternationalizedItem" => $internationalizedItem
                ];
            }

            Descriptions::insert($dataArray);

            echo "Descrições importadas!<br>";
        }


        if(count($accommodationsArray['Accommodation']) > 0){

            $dataArray = array();

            foreach($accommodationsArray['Accommodation'] as $index => $data){

               $localizationData = json_encode($data['LocalizationData']);
               $vat = json_encode($data['VAT']);
               $features = json_encode($data['Features']);
               $CheckInCheckOutInfo = json_encode($data['CheckInCheckOutInfo']);

               $dataArray[] = [
                    "AccommodationId" => $data['AccommodationId'],
                    "UserId" => $data['UserId'],
                    "CompanyId" => $data['CompanyId'],
                    "AccommodationName" => $data['AccommodationName'],
                    "IdGallery" => $data['IdGallery'],
                    "OccupationalRuleId" => $data['OccupationalRuleId'],
                    "PriceModifierId" => $data['PriceModifierId'],
                    "Purpose" => $data['Purpose'],
                    "UserKind" => $data['UserKind'],
                    "LocalizationData" => $localizationData,
                    "AccommodationUnits" => $data['AccommodationUnits'],
                    "Currency" => $data['Currency'],
                    "Vat" => $vat,
                    "Features" => $features,
                    "CheckInCheckOutInfo" => $CheckInCheckOutInfo,
               ];




               //importa LocalizationData em outra tabela
                $localizationArray = ["AccommodationId" => $data['AccommodationId']];

                if(isset($data['LocalizationData']['City']['Name']) && empty($data['LocalizationData']['City']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["City" => $data['LocalizationData']['City']['Name']]);
                }
                if(isset($data['LocalizationData']['Door']) && empty($data['LocalizationData']['Door']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Door" => $data['LocalizationData']['Door']]);
                }
                if(isset($data['LocalizationData']['Block']) && empty($data['LocalizationData']['Block']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Block" => $data['LocalizationData']['Block']]);
                }
                if(isset($data['LocalizationData']['Floor']) && empty($data['LocalizationData']['Floor']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Floor" => $data['LocalizationData']['Floor']]);
                }
                if(isset($data['LocalizationData']['Number']) && empty($data['LocalizationData']['Number']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Number" => $data['LocalizationData']['Number']]);
                }
                if(isset($data['LocalizationData']['Region']['Name']) && empty($data['LocalizationData']['Region']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Region" => $data['LocalizationData']['Region']['Name']]);
                }
                if(isset($data['LocalizationData']['Country']['Name']) && empty($data['LocalizationData']['Country']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Country" => $data['LocalizationData']['Country']['Name']]);
                }
                if(isset($data['LocalizationData']['AreaDist']['Name']) && empty($data['LocalizationData']['AreaDist']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["AreaDist" => $data['LocalizationData']['AreaDist']['Name']]);
                }
                if(isset($data['LocalizationData']['District']['Name']) && empty($data['LocalizationData']['District']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["District" => strtolower($data['LocalizationData']['District']['Name'])]);
                }
                if(isset($data['LocalizationData']['Locality']['Name']) && empty($data['LocalizationData']['Locality']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Locality" => $data['LocalizationData']['Locality']['Name']]);
                }
                if(isset($data['LocalizationData']['Province']['Name']) && empty($data['LocalizationData']['Province']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["Province" => $data['LocalizationData']['Province']['Name']]);
                }
                if(isset($data['LocalizationData']['KindOfWay']) && empty($data['LocalizationData']['AreaDist']['Name']) === false) {
                    $localizationArray = array_merge($localizationArray, ["KindOfWay" => $data['LocalizationData']['AreaDist']['Name']]);
                }
                Localizations::insert($localizationArray);
            }//foreach accommodations
            Accommodations::insert($dataArray);

            echo "Acomodações importadas!<br>";
            echo "Localizações importadas!";
        }


        //return view("xml-data");
    }
}
