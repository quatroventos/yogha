<?php

namespace App\Http\Controllers;

use App\Models\Localizations;
use App\Models\OccuppationalRules;
use Illuminate\Http\Request;
use App\Models\Accommodations;
use App\Models\Availabilities;
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
        \DB::table('occuppationalrules')->truncate();
        echo "occuppational rules apagada<br>";
        \DB::table('availabilities')->truncate();
        echo "occuppational rules apagada<br>";

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

            $availabilityXML = file_get_contents(public_path('xml/Availabilities.xml'));
            $availabilityObj = simplexml_load_string($availabilityXML);
            $availabilityJson = json_encode($availabilityObj);
            $availabilityArray = json_decode($availabilityJson, true);

            $ocuppationalRulesXML = file_get_contents(public_path('xml/OccupationalRules.xml'));
            $ocuppationalRulesObj = simplexml_load_string($ocuppationalRulesXML);
            $ocuppationalRulesJson = json_encode($ocuppationalRulesObj);
            $ocuppationalRulesArray = json_decode($ocuppationalRulesJson, true);


//        if(count($ratesArray['AccommodationList']['Accommodation']) > 0){
//
//            $dataArray = array();
//
//            foreach($ratesArray['AccommodationList']['Accommodation'] as $index => $data){
//                $dataArray = array_merge($dataArray, ["AccommodationId" => $data['AccommodationId']]);
//                $dataArray = array_merge($dataArray, ["AccommodationId" => $data['Capacity']]);
//
//                foreach($data['Rates']){
//
//                }
//
//            }
//
//            Rates::insert($dataArray);
//
//            echo "Rates importadas!<br>";
//        }

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

               //importa Availability em outra tabela
               foreach($availabilityArray['AccommodationList']['Accommodation'] as $availabilityData) {
                if ($availabilityData['AccommodationId'] == $data['AccommodationId']) {

                    //dd($availabilityData['Availabilities']['AvailabilityPeriod']);
                    
                    foreach ($availabilityData['Availabilities']['AvailabilityPeriod'] as $index => $availability) {

                        $availArray = [];

                        echo "importando Availabilities de " . $availabilityData['AccommodationId'] . " para accommodation: " . $data['AccommodationId'] . "<br>";

                        $availArray = array_merge($availArray, ["AccommodationId" => $availabilityData['AccommodationId']]);
            
                        if (isset($availability['StartDate']) && empty($availability['StartDate']) === false) {
                            $availArray = array_merge($availArray, ["StartDate" => $availability['StartDate']]);
                            echo "StartDate = " . $availability['StartDate'];
                        }

                        if (isset($rate['EndDate']) && empty($availability['EndDate']) === false) {
                            $availArray = array_merge($availability, ["EndDate" => $availability['EndDate']]);
                            echo "EndDate = " . $availability['EndDate'];
                        }

                        if (isset($rate['State']) && empty($availability['State']) === false) {
                            $availArray = array_merge($availability, ["State" => $availability['State']]);
                            echo "State = " . $availability['State'];
                        }

                        echo "<pre>";
                        print_r($availArray);
                        echo "</pre>";
                        Availabilities::insert($availArray);
                        echo "Availability importada para a accommodation: " . $data['AccommodationId'] . "<br>";
                    }

                } else {
                    //echo "Availability " . $availabilityData['AccommodationId'] . " não encontrada para a Accommodation " . $data['AccommodationId'] . "<br>";
                }

            }//foreach

                //importa Rates em outra tabela
                foreach($ratesArray['AccommodationList']['Accommodation'] as $rateData) {
                    if ($rateData['AccommodationId'] == $data['AccommodationId']) {

                        foreach ($rateData['Rates'] as $index => $rate) {

                            $rateArray = [];

                            echo "importando Rates de " . $rateData['AccommodationId'] . " para accommodation: " . $data['AccommodationId'] . "<br>";

                            $rateArray = array_merge($rateArray, ["AccommodationId" => $rateData['AccommodationId']]);
                            $rateArray = array_merge($rateArray, ["Capacity" => $rateData['Capacity']]);

                            if (isset($rate['StartDate']) && empty($rate['StartDate']) === false) {
                                $rateArray = array_merge($rateArray, ["StartDate" => $rate['StartDate']]);
                                echo "StartDate = " . $rate['StartDate'];
                            }

                            if (isset($rate['EndDate']) && empty($rate['EndDate']) === false) {
                                $rateArray = array_merge($rateArray, ["EndDate" => $rate['EndDate']]);
                                echo "EndDate = " . $rate['EndDate'];
                            }

                            if (isset($rateData['VAT']) && empty($rateData['VAT']) === false) {
                                $rateArray = array_merge($rateArray, ["VAT" => $rateData['VAT']['Included']]);
                                echo "VAT = " . $rateData['VAT']['Included'];
                            }

                            if (isset($rate['RoomOnly']) && empty($rate['RoomOnly']) === false) {
                                $rateArray = array_merge($rateArray, ["Price" => $rate['RoomOnly']['Price']]);
                                echo "Price = " . $rate['RoomOnly']['Price'];
                            }

                            echo "<pre>";
                            print_r($rateArray);
                            echo "</pre>";
                            Rates::insert($rateArray);
                            echo "Rate importada para a accommodation: " . $data['AccommodationId'] . "<br>";
                        }

                    } else {
                        echo "Rate " . $rateData['AccommodationId'] . " não encontrada para a Accommodation " . $data['AccommodationId'] . "<br>";
                    }
                }//foreach


                    //importa Occuppational Rules em outra tabela
                foreach($ocuppationalRulesArray['OccupationalRule'] as $occupationalRule){
                    if ($occupationalRule['Id'] == $data['OccupationalRuleId']) {
                        foreach($occupationalRule['Season'] as $index => $season) {
                            $occuppationalArray = [];

                            echo "importando occupational rule " . $data['OccupationalRuleId'] . " para accommodation: " . $data['AccommodationId'] . "<br>";

                            $occuppationalArray = array_merge($occuppationalArray, ["AccommodationId" => $data['AccommodationId']]);

                            if (isset($season['StartDate']) && empty($season['StartDate']) === false) {
                                $occuppationalArray = array_merge($occuppationalArray, ["StartDate" => $season['StartDate']]);
                                echo "StartDate = ".$season['StartDate'];
                            }

                            if (isset($season['EndDate']) && empty($season['EndDate']) === false) {
                                $occuppationalArray = array_merge($occuppationalArray, ["EndDate" => $season['EndDate']]);
                                echo "EndDate = ".$season['EndDate'];
                            }

                            if (isset($season['MinimumNights']) && empty($season['MinimumNights']) === false) {
                                $occuppationalArray = array_merge($occuppationalArray, ["MinimumNights" => $season['MinimumNights']]);
                            }
                            echo "<pre>";
                            print_r($occuppationalArray);
                            echo "</pre>";
                            OccuppationalRules::insert($occuppationalArray);
                            echo "Occuppational Rule importada para a accommodation: ".$data['AccommodationId']."<br>";
                        }

                    }else{
                        echo "Occuppational rule ".$occupationalRule['Id']." não encontrada para a Accommodation ".$data['AccommodationId']."<br>";
                    }
                }

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
