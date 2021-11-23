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
            ->where('rates.Rates->RatePeriod->EndDate', '>', "{$today}")
            ->get()
            ->unique('District');

        return response()->json($data);

    }

    //busca por distrito / bairro
    public function searchbydistrict($district)
    {
        $today = date("Y-m-d");

        $results = \DB::table('accommodations')
            ->Leftjoin('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('District', 'like', "%{$district}%")
            ->where('rates.Rates->RatePeriod->EndDate', '>', "{$today}")
            ->get();

            $rates = json_decode($results[0]->Rates, true);
            $price = $rates['RatePeriod']['RoomOnly']['Price'];

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
            ->Leftjoin('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('rates.Rates->RatePeriod->EndDate', '>', "{$today}")
            ->take(1)
            ->inRandomOrder()
            ->get();

        return view('site.busca.resultados', compact('results', 'district', 'surpriseme', 'recently_viewed', 'price'));
    }

}
