<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $user = getUserData();
        $userreservations = getUserReservations();
        $userfuturereservations = getUserFutureReservations();
        $favorites = getUserFavorites();
        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();

        //TODO: relacionar com categorias
        $posts = Blog::all();
        $cats = BlogCategories::all();

        return view('site.blog.index', compact(
            'posts',
            'cats',
            'recently_viewed',
            'surpriseme',
            'favorites',
            'user',
            'userreservations',
            'userfuturereservations'
        ));
    }
}
