<?php

use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

function getUserData(){
    if (Auth::check()) {
        $user = Auth::user();
    }else{
        $user = '';
    }
    return $user;
}
function getUserReservations()
{
        $today = date("Y-m-d");
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $userreservations =  \DB::table('orders')
                ->select('orders.*','accommodations.*', 'descriptions.*', 'localizations.*')
                ->join('accommodations', 'accommodations.AccommodationId', '=', 'orders.accommodationId')
                ->join('descriptions','descriptions.AccommodationId','=','orders.accommodationId')
                ->join('localizations','localizations.AccommodationId','=','orders.accommodationId')
                ->where('orders.users_id', '=', $userid)
                ->where('orders.checkin_date', '<', $today)
                ->get();
        }else {
            $userreservations = "";
        }
        return $userreservations;

//    $today = date("Y-m-d");
//    if (Auth::check()) {
//        $userid = Auth::user()->id;
//        $userreservations =  \DB::table('orders')
//            ->select('orders.*','accommodations.*', 'descriptions.*', 'localizations.*')
//            ->join('accommodations', 'accommodations.AccommodationId', '=', 'orders.accommodationId')
//            ->join('descriptions','descriptions.AccommodationId','=','orders.accommodationId')
//            ->join('localizations','localizations.AccommodationId','=','orders.accommodationId')
//            ->where('orders.users_id', '=', $userid)
//            ->where('orders.checkin_date', '<', $today)
//            ->get();
//    }else {
//        $userreservations = "";
//    }
//    return $userreservations;
}

function getUserFutureReservations()
{
    $today = date("Y-m-d");
    if (Auth::check()) {
        $userid = Auth::user()->id;
        $userfuturereservations =  \DB::table('orders')
            ->select('orders.*','accommodations.*', 'descriptions.*', 'localizations.*')
            ->join('accommodations', 'accommodations.AccommodationId', '=', 'orders.accommodationId')
            ->join('descriptions','descriptions.AccommodationId','=','orders.accommodationId')
            ->join('localizations','localizations.AccommodationId','=','orders.accommodationId')
            ->where('orders.users_id', '=', $userid)
            ->where('orders.checkin_date', '>=', $today)
            ->get();

        //dd($userfuturereservations);
    }else {
        $userfuturereservations = "";
    }
    return $userfuturereservations;
}

function getUserFavorites()
{
    if (Auth::check()) {
        $favorites = \DB::table('favorites')
            ->select('favorites.*', 'accommodations.*', 'rates.*', 'descriptions.*','localizations.*')
            ->join('accommodations', 'accommodations.AccommodationId', '=', 'favorites.accommodation_id')
            ->join('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->join('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
            ->join('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('favorites.user_id', '=', Auth::user()->id)
            ->get();
    }else{
        $favorites="";
    }
    return $favorites;
}

function getUserRecentlyViewed(){
    //select acomoda????es mais recentes para a busca
    $accommodations_session = session()->get('accommodations.recent');
    if(!empty($accommodations_session)) {
        $accommodations_session = array_reverse($accommodations_session);
        $recently_viewed = \DB::table('accommodations')
            ->select('AccommodationName', 'slug')
            //->where('AccommodationId','=',$accommodations_session)
            ->whereIn('accommodations.AccommodationId', $accommodations_session)
            ->take(10)
            ->get();
    }else{
        $recently_viewed = '';
    }
    return $recently_viewed;
}

function generateSurprisemeUrl(){
    //seleciona aleatoriamente uma acomoda????o para o bot??o Surpreenda-me
    $surpriseme = \DB::table('accommodations')
        ->take(1)
        ->inRandomOrder()
        ->get();

    return $surpriseme;
}

function getUserLocation(){
    //recupera a localiza????o do usu??rio baseada no ip
    //TODO: mudar para ip do usu??rio, usando est??tico para testes
    $ip = $request->ip();
    $position = Location::get('178.132.95.179');
}

function getAllServices(){
    return Services::all();
}
