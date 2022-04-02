<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Localizations;
use App\Models\Descriptions;
use App\Models\Stats;
use Carbon\Carbon;
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

        $data['Districts'] = \DB::table('localizations')
            ->select('localizations.District','localizations.City')
            ->where('localizations.District', 'like', "%".strtolower($input['query'])."%")
            ->where('localizations.District', '<>', "sin especificar")
            ->get()
            ->unique('District');

        $data['Accommodations'] = \DB::table('accommodations')
            ->select('accommodations.AccommodationName','accommodations.slug')
            ->whereRaw('LOWER("AccommodationName") LIKE ? ' , "%".strtolower($input['query'])."%")
            ->take(20)
            ->get();

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
        $nights = round((strtotime($enddate) - strtotime($startdate)) / 86400, 1);

        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");

        if($startdate == '' && $enddate == '') {
            $results = Accommodations::
            with('descriptions')
                ->with('pictures')
                ->whereRelation('localizations', 'District', 'like', "%{$district}%")
                ->get();

        }else{

            $results = Accommodations::
            with('descriptions')
                ->with('pictures')
                ->with(['rates' => function ($query) use ($startdate, $enddate){
                    $query->where('StartDate', '<', "{$startdate}")
                        ->where('EndDate', '>', "{$enddate}");
                }])
                ->whereHas('availabilities', function($query) use ($startdate, $enddate){
                    $query->where('State', 'like', 'AVAILABLE')
                        ->where('StartDate', '<', "{$startdate}")
                        ->where('EndDate', '>', "{$enddate}");
                })
                ->whereRelation('localizations', 'District', 'like', "%{$district}%")
                ->get();

        }

        //formata datas para usar na view

        $fstartdate =  Carbon::parse($startdate)->format('d/m/Y');
        $fenddate =  Carbon::parse($enddate)->format('d/m/Y');

        return view('site.busca.resultados', compact('results', 'district', 'surpriseme', 'recently_viewed', 'startdate', 'enddate','fstartdate', 'fenddate'));
    }

}
