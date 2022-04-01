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

        $user = getUserData();
        $userreservations = getUserReservations();
        $userfuturereservations = getUserFutureReservations();
        $favorites = getUserFavorites();
        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();
        $services = getAllServices();

        $total_accommodations = \DB::table('accommodations')->count();

        //descontos exclusivos (ordena pelo preço mais baixo)
        $discount = \DB::table('accommodations')
            ->select('accommodations.*','rates.*')
            ->join('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('Price', '>', '30')
            ->OrderBy('Price','ASC')
            ->take(10)
            ->get();


        $startdate = date("Y-m-d");
        $enddate = date('Y-m-d', strtotime($startdate. ' + 2 days'));

        $discount = Accommodations::
        join('rates','rates.AccommodationId','=','accommodations.AccommodationId')
        ->where('rates.StartDate', '<', "{$startdate}")
        ->where('rates.EndDate', '>', "{$enddate}")
        ->with('pictures')
        ->orderby('Price', 'ASC')
        ->take(10)
        ->get();

        //accommodations mais acessadas

        $mostvisited = Accommodations::withCount('views')
            ->with('pictures')
            ->orderBy('views_count', 'desc')
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


        return view('site.home.index', compact(
            'accommodations',
            'shelves',
            'recently_viewed',
            'surpriseme',
            'user',
            'mostvisited',
            'discount',
            'populardistricts',
            'favorites',
            'userreservations',
            'userfuturereservations',
            'services',
            'total_accommodations'
        ));
    }
}
