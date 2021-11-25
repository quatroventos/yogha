<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($accommodationid)
    {
        $accommodation = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','rates.*')
            ->Leftjoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('accommodations.AccommodationId','=', $accommodationid)
            ->get();

        $occuppationalrules = \DB::table('occuppationalrules')
            ->select('occuppationalrules')
            ->where('occuppationalrules.AccommodationId','=', $accommodation[0]->AccommodationId)
            ->get();

        $services = Services::all();

        //grava visita na sessão para mostrar em ultimos visitados
        session()->push('accommodations.recent', $accommodation[0]->AccommodationId);

        $description = json_decode($accommodation[0]->InternationalizedItem, true);
        $pictures = json_decode($accommodation[0]->Pictures, true);
        $features = json_decode($accommodation[0]->Features, true);
        $localization = json_decode($accommodation[0]->LocalizationData, true);

        $latitude = $localization['GoogleMaps']['Latitude'];
        $longitude = $localization['GoogleMaps']['Longitude'];
        $zoom = $localization['GoogleMaps']['Zoom'];

        //calcula o numero total de camas disponíveis
        $totalcamas = 0;
        if(empty($features['Distribution']['DoubleBeds']) === false){
            $totalcamas +=  $features['Distribution']['DoubleBeds'];
        }
        if(empty($features['Distribution']['IndividualBeds']) === false){
            $totalcamas += $features['Distribution']['IndividualBeds'];
        }
        if(empty($features['Distribution']['QueenBeds']) === false){
            $totalcamas += $features['Distribution']['QueenBeds'];
        }
        if(empty($features['Distribution']['KingBeds']) === false){
            $totalcamas += $features['Distribution']['KingBeds'];
        }

        return view('site.accommodation.index', compact('accommodation', 'description', 'pictures', 'features', 'localization', 'latitude', 'longitude', 'zoom', 'totalcamas', 'services', 'occuppationalrules' ));
    }

}
