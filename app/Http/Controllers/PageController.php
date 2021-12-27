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
        $user = getUserData();
        $userreservations = getUserReservations();
        $userfuturereservations = getUserFutureReservations();
        $favorites = getUserFavorites();
        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();
        $services = getAllServices();

        if (view()->exists("site.paginas.{$page}")) {
            return view("site.paginas.{$page}", compact(
                'recently_viewed',
                'surpriseme',
                'user',
                'favorites',
                'userreservations',
                'userfuturereservations',
                'services'
            ));
        }
        return abort(404);
    }
}
