<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
        $accommodations = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*')
            ->join('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->get();

        $shelves = \DB::table('shelves')
            ->select('shelves.*','shelf_layouts.layoutfile', 'shelf_filters.query')
            ->join('shelf_layouts','shelf_layouts.id','=','shelves.shelfLayoutId')
            ->join('shelf_filters','shelf_filters.id','=','shelves.shelfFilterId')
            ->get();

        $ip = $request->ip();
        echo $ip;
        //TODO: mudar para ip do usuário, usando estático para testes
        $position = Location::get('178.132.95.179');


        return view('site.home.index', compact('accommodations', 'shelves', 'position'));
    }
}
