<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $today = date("Y-m-d");

        if (Auth::check()) {
            $userid = Auth::user()->id;
            $user = \DB::table('public.customers')
                ->select('public.customers.*')
                ->leftJoin('site.users', 'site.users.email', '=', 'public.customers.email')
                ->leftJoin('avantio.booking', 'avantio.booking.customer_id', '=', 'public.customers.id')
                ->where('site.users.id', '=',  $userid)
                ->get();
            //dd($user);
        }else{
            $user = '';
        }

        if (Auth::check()) {
            $userid = Auth::user()->id;
            $useremail = Auth::user()->email;
            $user = Auth::user();
            $userreservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados do Admin via api?
                ->select('avantio.booking_lists.*','accommodations.*')
                ->join('site.accommodations', 'accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('descriptions','descriptions.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->join('stats','stats.content_id', '=', 'avantio.booking_lists.accommodation_code')
                ->join('rates','rates.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->where('booking_lists.email', '=', $useremail)
                ->get();
            $userfuturereservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api?
                ->select('avantio.booking_lists.*','site.accommodations.*', 'site.descriptions.*', 'site.localizations.*')
                ->join('site.accommodations', 'site.accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('site.descriptions','site.descriptions.AccommodationId','=','accommodations.AccommodationId')
                ->join('site.localizations','site.localizations.AccommodationId','=','accommodations.AccommodationId')
                ->where('booking_lists.email', '=', $useremail)
                ->where('booking_lists.start_date', '>', $today)
                ->get();
        }else{
            $user = '';
            $userreservations = '';
            $userfuturereservations = '';
        }


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

        if (view()->exists("site.paginas.{$page}")) {
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


            return view("site.paginas.{$page}", compact('recently_viewed', 'surpriseme', 'user','favorites', 'userreservations', 'userfuturereservations'));
        }
        return abort(404);
    }
}
