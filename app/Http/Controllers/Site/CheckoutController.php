<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CheckoutController extends Controller{

    public function index()
    {

        //TODO: colocar em um helper ou trait
        //select acomodações mais recentes para a busca
        $accommodations_session = session()->get('accommodations.recent');
        if (!empty($accommodations_session)) {
            $accommodations_session = array_reverse($accommodations_session);
            $recently_viewed = \DB::table('accommodations')
                ->select('AccommodationName', 'AccommodationId')
                //->where('AccommodationId','=',$accommodations_session)
                ->whereIn('accommodations.AccommodationId', $accommodations_session)
                ->take(10)
                ->get();
        } else {
            $recently_viewed = '';
        }

        //TODO: colocar em um helper ou trait
        //pega aleatoriamente uma acomodação para o botão me surpreenda
        $surpriseme = \DB::table('accommodations')
            ->take(1)
            ->inRandomOrder()
            ->get();

        return view('site.checkout.index', compact('recently_viewed', 'surpriseme'));
    }
}
