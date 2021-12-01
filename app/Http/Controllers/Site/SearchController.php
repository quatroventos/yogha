<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Localizations;
use App\Models\Descriptions;
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
        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if($startdate == '') {
            $startdate = $today;
        }
        if($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today. ' + 2 days'));
        }

        $results = \DB::table('accommodations')
            ->Leftjoin('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('rates','accommodations.AccommodationId', '=', 'rates.AccommodationId')
            ->where('District', 'like', "%{$district}%")
            ->where('StartDate', '<', "{$startdate}")
            ->where('EndDate', '>', "{$enddate}")
            ->get();

        //recupera occupattional rules de acordo com a data selecionada
        $occuppationalrules = \DB::table('occuppationalrules')
            ->where('AccommodationId', '=', $results[0]->AccommodationId)
            ->where('StartDate', '<', "{$startdate}")
            ->where('EndDate', '>', "{$enddate}")
            ->get();

        //TODO: colocar em um helper ou trait
        //select acomodações mais recentes para a busca
        $accommodations_session = session()->get('accommodations.recent');
        if(!empty($accommodations_session)) {
            $accommodations_session = array_reverse($accommodations_session);
            $recently_viewed = \DB::table('accommodations')
                ->select('AccommodationName', 'AccommodationId')
                //->where('AccommodationId','=',$accommodations_session)
                ->whereIn('accommodations.AccommodationId', $accommodations_session)
                ->take(10)
                ->get();
        }else{
            $recently_viewed = '';
        }

        //TODO: colocar em um helper ou trait
        //pega aleatoriamente uma acomodação para o botão me surpreenda
        $surpriseme = \DB::table('accommodations')
            ->take(1)
            ->inRandomOrder()
            ->get();

        return view('site.busca.resultados', compact('results', 'district', 'surpriseme', 'recently_viewed', 'occuppationalrules', 'startdate', 'enddate'));
    }

}
