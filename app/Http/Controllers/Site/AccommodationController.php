<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($accommodationid)
    {
        session()->push('accommodations.recent', $accommodationid);

        $accommodation = \DB::table('accommodations')
            ->select('accommodations.*','descriptions.*','rates.*')
            ->Leftjoin('descriptions','descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->Leftjoin('rates','rates.AccommodationId','=','accommodations.AccommodationId')
            ->where('accommodations.AccommodationId','=', $accommodationid)
            ->get();

        return view('site.accommodation.index', compact('accommodation'));
    }

}
