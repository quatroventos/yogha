<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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

        $accommodation = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','rates.*')
            ->Leftjoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('accommodations.AccommodationId','=', $accommodationid)
            ->where('StartDate', '<', "{$startdate}")
            ->where('EndDate', '>', "{$enddate}")
            ->get();


        $occuppationalrules = \DB::table('occuppationalrules')
            ->select('occuppationalrules')
            ->where('occuppationalrules.AccommodationId','=', $accommodation[0]->AccommodationId)
            ->get();

        $services = Services::all();

        $availability = \DB::table('availabilities')
        ->where('AccommodationId','=', $accommodationid)
        ->where('State', '=', 'UNAVAILABLE')
        ->get();


        //cria array com o range de datas 
        $unavailableDates = array();
        $current = strtotime($availability[0]->StartDate);
        $last = strtotime($availability[0]->EndDate);

        while( $current <= $last ) {

            $unavailableDates[] = date("Y-m-d", $current);
            $current = strtotime("+1 day", $current);
        }

        $unavailableDates = json_encode($unavailableDates);
    

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

        return view('site.accommodation.index', compact('accommodation', 'description', 'pictures', 'features', 'localization', 'latitude', 'longitude', 'zoom', 'totalcamas', 'services', 'occuppationalrules','unavailableDates' ));
    }

    /**
     * Creating date collection between two dates
     *
     * <code>
     * <?php
     * # Example 1
     * date_range("2014-01-01", "2014-01-20", "+1 day", "m/d/Y");
     *
     * # Example 2. you can use even time
     * date_range("01:00:00", "23:00:00", "+1 hour", "H:i:s");
     * </code>
     *
     * @author Ali OYGUR <alioygur@gmail.com>
     * @param string since any date, time or datetime format
     * @param string until any date, time or datetime format
     * @param string step
     * @param string date of output format
     * @return array
     */
    public function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

}
