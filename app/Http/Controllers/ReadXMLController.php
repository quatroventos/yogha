<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodations;
use App\Models\Descriptions;
use App\Models\Rates;

class ReadXMLController extends Controller
{
    public function index(Request $req)
    {

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

            echo "Rates importadas!";
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

            echo "Descrições importadas!";
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
            }

           Accommodations::insert($dataArray);

           echo "Acomodações importadas!";
        }

        //return view("xml-data");
    }
}
