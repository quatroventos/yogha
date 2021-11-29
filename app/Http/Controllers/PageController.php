<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
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


            return view("site.paginas.{$page}", compact('recently_viewed', 'surpriseme'));
        }
        return abort(404);
    }
}
