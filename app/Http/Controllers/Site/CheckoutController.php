<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Jetimob\Juno\Facades\Juno;

class CheckoutController extends Controller
{

    public function index($accommodationid, $startdate = '', $enddate = '', $adults = '', $children = '', $ages = '')
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $user = \DB::table('public.customers')
                ->select('public.customers.*')
                ->leftJoin('site.users', 'site.users.email', '=', 'public.customers.email')
                ->leftJoin('avantio.booking', 'avantio.booking.customer_id', '=', 'public.customers.id')
                ->where('site.users.id', '=', $userid)
                ->get();
        } else {
            $user = '';
        }

        if (isset($userid) != '') {
            $favorites = \DB::table('favorites')
                ->select('favorites.*', 'accommodations.*', 'rates.*', 'descriptions.*', 'localizations.*')
                ->join('accommodations', 'accommodations.AccommodationId', '=', 'favorites.accommodation_id')
                ->join('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
                ->join('localizations', 'localizations.AccommodationId', '=', 'accommodations.AccommodationId')
                ->join('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
                ->where('favorites.user_id', '=', $userid)
                ->get();
        } else {
            $favorites = "";
        }


        $accommodation = \DB::table('accommodations')
            ->select('accommodations.*', 'descriptions.*', 'rates.*')
            ->Leftjoin('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('accommodations.AccommodationId', '=', $accommodationid)
            ->first();

        $pictures = json_decode($accommodation->Pictures, true);
        $features = json_decode($accommodation->Features, true);

        //calcula o numero total de camas disponíveis
        $totalcamas = 0;
        if (empty($features['Distribution']['DoubleBeds']) === false) {
            $totalcamas += $features['Distribution']['DoubleBeds'];
        }
        if (empty($features['Distribution']['IndividualBeds']) === false) {
            $totalcamas += $features['Distribution']['IndividualBeds'];
        }
        if (empty($features['Distribution']['QueenBeds']) === false) {
            $totalcamas += $features['Distribution']['QueenBeds'];
        }
        if (empty($features['Distribution']['KingBeds']) === false) {
            $totalcamas += $features['Distribution']['KingBeds'];
        }

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

        return view('site.checkout.index', compact('accommodation', 'pictures', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites'));
    }

    //filtra por data e quantidade de hospedes
    public function check_availability($accommodationid = '', $startdate = '', $enddate = '')
    {
        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if ($startdate == '') {
            $startdate = $today;
        }
        if ($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today . ' + 2 days'));
        }

        $availability = \DB::table('availabilities')
            ->where('AccommodationId', '=', $accommodationid)
            ->where('State', '=', 'UNAVAILABLE')
            ->get();

        if (count($availability) != 0) {
            //cria array com o range de datas
            $unavailableDates = array();
            $current = strtotime($availability[0]->StartDate);
            $last = strtotime($availability[0]->EndDate);

            while ($current <= $last) {

                $unavailableDates[] = date("Y-m-d", $current);
                $current = strtotime("+1 day", $current);
            }

            $unavailableDates = json_encode($unavailableDates);
        } else {
            $unavailableDates = "";
        }

        return view('site.checkout.check_availability', compact('accommodationid', 'unavailableDates', 'startdate', 'enddate'));
    }

    public function generatebillet()
    {
        echo Juno::request(DocumentListRequest::class, $resourceToken);
    }
}
