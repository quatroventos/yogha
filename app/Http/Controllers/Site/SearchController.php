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

        $data = Localizations::select('District', 'Region')
            ->where('District', 'like', "%".strtolower($input['query'])."%")
            //->whereJsonContains('LOWER(LocalizationData->District->Name)', "%{$input['query']}%")
            ->get();

        return response()->json($data);

    }

    //busca por distrito / bairro
    public function searchbydistrict($district)
    {
        $today = date("Y-m-d");
        //TODO: buscar propriedades aonde o bairro for a busca e estiver dentro
        //do range de datas válidas para a acomodação
        $results = \DB::table('accommodations')
            ->Leftjoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('localizations','localizations.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('District', 'like', "%{$district}%")
            ->where('rates.Rates->RatePeriod->EndDate', '>', "{$today}")
            ->get();

        //$rates = json_decode($results[0]->Rates, true);
        //$price = $rates['RatePeriod']['RoomOnly']['Price'];
        $price = 1;

        session()->forget('accommodations.recent');
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
            ->select('AccommodationId')
            ->take(1)
            ->inRandomOrder()
            ->get();

        return view('site.busca.resultados', compact('results', 'district', 'surpriseme', 'recently_viewed', 'price'));
    }

}
