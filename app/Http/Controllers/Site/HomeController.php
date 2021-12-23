<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodations;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        //session()->forget('accommodations.recent');
        //die();
        $today = date("Y-m-d");

        if (Auth::check()) {
            $userid = Auth::user()->id;
            $useremail = Auth::user()->email;
            $user = Auth::user();
            $userreservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api
                ->select('avantio.booking_lists.*','site.accommodations.*', 'site.descriptions.*', 'site.localizations.*')
                ->join('site.accommodations', 'site.accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('site.descriptions','site.descriptions.AccommodationId','=','accommodations.AccommodationId')
                ->join('site.localizations','site.localizations.AccommodationId','=','accommodations.AccommodationId')
                ->where('booking_lists.email', '=', $useremail)
                ->where('booking_lists.start_date', '<', $today)
                ->get();

            $userfuturereservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api
                ->select('avantio.booking_lists.*','site.accommodations.*', 'site.descriptions.*', 'site.localizations.*')
                ->join('site.accommodations', 'site.accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('site.descriptions','site.descriptions.AccommodationId','=','accommodations.AccommodationId')
                ->join('site.localizations','site.localizations.AccommodationId','=','accommodations.AccommodationId')
                ->where('booking_lists.email', '=', $useremail)
                ->where('booking_lists.start_date', '>', $today)
                ->get();
            //dd($userfuturereservations);

        }else{
            $user = '';
            $userreservations = '';
            $userfuturereservations = '';
        }


        //descontos exclusivos (ordena pelo preço mais baixo)
        $discount = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','rates.*')
            ->Leftjoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('Price', '>', '30')
            ->OrderBy('Price','ASC')
            ->take(10)
            ->get();

        //accommodations mais acessadas
        $mostvisited = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','rates.*',\DB::raw('count(stats.*) as views'))
            ->leftJoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->leftJoin('stats','stats.content_id', '=', 'accommodations.AccommodationId')
            ->leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->groupBy('accommodations.AccommodationId', 'stats.content_id', 'accommodations.id', 'descriptions.id', 'rates.id')
            ->where('stats.type', '=', 'accommodation')
            ->OrderBy('views', 'DESC')
            ->take(10)
            ->get();


        //districts mais acessadas
        $populardistricts = \DB::table('localizations')
            ->select('localizations.District',\DB::raw('count(stats.*) as views'))
            ->leftJoin('stats','stats.content_id', '=', 'localizations.AccommodationId')
            ->groupBy('localizations.District')
            ->where('stats.type', '=', 'accommodation')
            ->OrderBy('views', 'DESC')
            ->take(10)
            ->get();

        //select acomodações na home
        $accommodations = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*')
            ->leftJoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->take(10)
            ->get();

        //select prateleiras na home
        $shelves = \DB::table('shelves')
            ->select('shelves.*','shelf_layouts.layoutfile', 'shelf_filters.query')
            ->leftJoin('shelf_layouts','shelf_layouts.id','=','shelves.shelfLayoutId')
            ->leftJoin('shelf_filters','shelf_filters.id','=','shelves.shelfFilterId')
            ->get();

        if(isset($userid) != '') {
            $favorites = \DB::table('favorites')
                ->select('favorites.*', 'accommodations.*', 'rates.*', 'descriptions.*','localizations.*')
                ->join('accommodations', 'accommodations.AccommodationId', '=', 'favorites.accommodation_id')
                ->join('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
                ->join('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
                ->join('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
                ->where('favorites.user_id', '=', $userid)
                ->get();
        }else{
            $favorites="";
        }

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


        //recupera a localização do usuário baseada no ip
        //TODO: mudar para ip do usuário, usando estático para testes
        $ip = $request->ip();
        $position = Location::get('178.132.95.179');


        return view('site.home.index', compact('accommodations', 'shelves', 'position', 'recently_viewed', 'surpriseme', 'user', 'mostvisited', 'discount', 'populardistricts', 'favorites', 'userreservations', 'userfuturereservations'));
    }
}
