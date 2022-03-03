<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;

/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware(['auth']);
}

class FavoritesController extends Controller
{
    /**
     * Adiciona aos favs
     * @return \App\Models\Favorites
     */
    protected function fav($accommodationid, $userid)
    {
        $fav = new Favorites();
        $fav->user_id = $userid;
        $fav->accommodation_id = $accommodationid;
        $fav->save();

        return true;
    }

    protected function unfav($accommodationid, $userid)
    {
        Favorites::where('user_id',$userid)->where('accommodation_id',$accommodationid)->delete();
        return true;
    }
}
