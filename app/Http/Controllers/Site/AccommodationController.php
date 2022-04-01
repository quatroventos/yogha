<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Favorites;
use App\Models\Services;
use App\Models\Stats;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($accommodationid, $startdate='', $enddate='')
    {
        //insere nas estatísticas
        $stat = new Stats;
        $stat->type = 'accommodation';
        $stat->content_id = $accommodationid;
        $stat->save();

        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if($startdate == '') {
            $startdate = $today;
        }
        if($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today. ' + 2 days'));
        }


        $isfav = 0;
        if(auth()->id() != null) {
            $favorites = Favorites::where('user_id', auth()->id())->where('accommodation_id', $accommodationid)->get();
            if(count($favorites)){
                $isfav = 1;
            }
        }

        $accommodation = Accommodations::with('descriptions')
            ->with('pictures')
            ->with('rates')
            ->where('accommodations.AccommodationId','=', $accommodationid)
            ->first();

        $rates = \DB::table('rates')
            ->where('AccommodationId','=', $accommodationid)
            ->where('StartDate', '>', "{$startdate}")
            ->where('EndDate', '<', "{$enddate}")
            ->get()->first();


        $occuppationalrules = \DB::table('occuppationalrules')
            ->select('occuppationalrules')
            ->where('occuppationalrules.AccommodationId','=', $accommodationid)
            ->get();

        $services = Services::all();

        //grava visita na sessão para mostrar em ultimos visitados
        session()->push('accommodations.recent', $accommodationid);

        $description = json_decode($accommodation->InternationalizedItem, true);
        $features = json_decode($accommodation->Features, true);
        $localization = json_decode($accommodation->LocalizationData, true);

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

        return view('site.accommodation.index', compact('rates','accommodation', 'description', 'features', 'localization', 'latitude', 'longitude', 'zoom', 'totalcamas', 'services', 'occuppationalrules', 'isfav' ));
    }

}
