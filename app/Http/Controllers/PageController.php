<?php

namespace App\Http\Controllers;

use Dymantic\InstagramFeed\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Phpfastcache\Helper\Psr16Adapter;


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


        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'yogha.host', '@Yogha160212', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you want to force login $instagram->login(true)
        $instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
        $account = $instagram->getAccount('yogha.host');
        $accountMedias = $account->getMedias();
        foreach ($accountMedias as $key  => $accountMedia) {
            $instafeed[$key] = str_replace("&amp;","&", $accountMedia->getimageHighResolutionUrl());
            $images[$key] = str_replace("&amp;","&", $accountMedia->getimageHighResolutionUrl());
            $path = $images[$key];
            $imageName = $key.'.png';
            $img = public_path('insta/images/') . $imageName;
            file_put_contents($img, file_get_contents($path));
        }


        if (view()->exists("site.paginas.{$page}")) {
            return view("site.paginas.{$page}", compact(
                'recently_viewed',
                'surpriseme',
                'user',
                'favorites',
                'userreservations',
                'userfuturereservations',
                'services',
                'instafeed'
            ));
        }
        return abort(404);
    }
}
