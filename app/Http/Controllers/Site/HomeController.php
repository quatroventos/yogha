<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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

        //select acomodações na home
        $accommodations = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*')
            ->join('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->get();

        //select prateleiras na home
        $shelves = \DB::table('shelves')
            ->select('shelves.*','shelf_layouts.layoutfile', 'shelf_filters.query')
            ->join('shelf_layouts','shelf_layouts.id','=','shelves.shelfLayoutId')
            ->join('shelf_filters','shelf_filters.id','=','shelves.shelfFilterId')
            ->get();

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

        //pega aleatoriamente uma acomodação para o botão me surpreenda
        $surpriseme = \DB::table('accommodations')
            ->select('AccommodationId')
            ->take(1)
            ->inRandomOrder()
            ->get();


        //recupera a localização do usuário baseada no ip
        //TODO: mudar para ip do usuário, usando estático para testes
        $ip = $request->ip();
        $position = Location::get('178.132.95.179');


        return view('site.home.index', compact('accommodations', 'shelves', 'position', 'recently_viewed', 'surpriseme'));
    }
}
