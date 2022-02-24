<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Localizations;
use App\Models\Descriptions;
use App\Models\Stats;
use Illuminate\Http\Request;


class SearchController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
        $input = $request->all();
        $today = date("Y-m-d");

        $data = \DB::table('localizations')
            ->Leftjoin('rates', 'rates.AccommodationId', '=', 'localizations.AccommodationId')
            ->where('localizations.District', 'like', "%".strtolower($input['query'])."%")
            ->get()
            ->unique('District');

        return response()->json($data);

    }

    //filtra por data e quantidade de hospedes
    public function filter($district = '', $startdate='', $enddate='')
    {
        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if($startdate == '') {
            $startdate = $today;
        }
        if($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today. ' + 2 days'));
        }

        return view('site.busca.filtro', compact('district', 'startdate', 'enddate'));
    }


    //busca por distrito / bairro
    public function searchbydistrict($district, $startdate='', $enddate='')
    {

        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();

        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if($startdate == '') {
            $startdate = $today;
        }
        if($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today. ' + 2 days'));
        }

        $results = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','localizations.*','rates.Price')
            ->Leftjoin('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Rightjoin('rates','rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('localizations.District', 'like', "%{$district}%")
            ->where('rates.StartDate', '>', "{$startdate}")
            ->where('rates.EndDate', '<', "{$enddate}")
            ->get();

        //dd($results);

//        //recupera occupattional rules de acordo com a data selecionada
//        $occuppationalrules = \DB::table('occuppationalrules')
//            ->where('AccommodationId', '=', $results[0]->AccommodationId)
//            ->where('StartDate', '<', "{$startdate}")
//            ->where('EndDate', '>', "{$enddate}")
//            ->get();



        return view('site.busca.resultados', compact('results', 'district', 'surpriseme', 'recently_viewed', 'startdate', 'enddate'));
    }

}
