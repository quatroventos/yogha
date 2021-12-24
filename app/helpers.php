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
        $useremail = Auth::user()->email;
        $userreservations =  \DB::table('avantio.booking_lists')
            ->select('avantio.booking_lists.*','site.accommodations.*', 'site.descriptions.*', 'site.localizations.*')
            ->join('site.accommodations', 'site.accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
            ->join('site.descriptions','site.descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->join('site.localizations','site.localizations.AccommodationId','=','accommodations.AccommodationId')
            ->where('booking_lists.email', '=', $useremail)
            ->where('booking_lists.start_date', '<', $today)
            ->get();
    }else {
        $userreservations = "";
    }
    return $userreservations;
}

function getUserFutureReservations()
{
    $today = date("Y-m-d");
    if (Auth::check()) {
        $useremail = Auth::user()->email;
        $userfuturereservations =  \DB::table('avantio.booking_lists')
            //TODO: puxar dados via api
            ->select('avantio.booking_lists.*','site.accommodations.*', 'site.descriptions.*', 'site.localizations.*')
            ->join('site.accommodations', 'site.accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
            ->join('site.descriptions','site.descriptions.AccommodationId','=','accommodations.AccommodationId')
            ->join('site.localizations','site.localizations.AccommodationId','=','accommodations.AccommodationId')
            ->where('booking_lists.email', '=', $useremail)
            ->where('booking_lists.start_date', '>', $today)
            ->get();
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
    return $recently_viewed;
}

function generateSurprisemeUrl(){
    //seleciona aleatoriamente uma acomodação para o botão me surpreenda
    $surpriseme = \DB::table('accommodations')
        ->take(1)
        ->inRandomOrder()
        ->get();

    return $surpriseme;
}

function getUserLocation(){
    //recupera a localização do usuário baseada no ip
    //TODO: mudar para ip do usuário, usando estático para testes
    $ip = $request->ip();
    $position = Location::get('178.132.95.179');
}

function getAllServices(){
    return Services::all();
}
