<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;

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

        return view('site.home.index', compact('accommodations'));
    }
}
