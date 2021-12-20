<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jetimob\Juno\Juno;
use Jetimob\Juno\Lib\Model\Billing;
use Jetimob\Juno\Lib\Model\Charge;
use Jetimob\Juno\Lib\Http\Charge\ChargeCreationRequest;


class CheckoutController extends Controller
{

    public function index($accommodationid, $startdate = '', $enddate = '', $adults = '', $children = '', $ages = '')
    {

        if (Auth::check()) {
            $userid = Auth::user()->id;
            $useremail = Auth::user()->email;
            $user = Auth::user();
            $userreservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api
                ->select('avantio.booking_lists.*','accommodations.*')
                ->join('site.accommodations', 'accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('descriptions','descriptions.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->join('stats','stats.content_id', '=', 'avantio.booking_lists.accommodation_code')
                ->join('rates','rates.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->where('booking_lists.email', '=', $useremail)
                ->get();
        }else{
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

        return view('site.checkout.index', compact('accommodation', 'pictures', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations'));
    }

    //filtra por data e quantidade de hospedes
    public function check_availability($accommodationid = '', $startdate = '', $enddate = '')
    {

        if (Auth::check()) {
            $userid = Auth::user()->id;
            $useremail = Auth::user()->email;
            $user = Auth::user();
            $userreservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api
                ->select('avantio.booking_lists.*','accommodations.*')
                ->join('site.accommodations', 'accommodations.AccommodationId', '=', 'avantio.booking_lists.accommodation_code')
                ->join('descriptions','descriptions.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->join('stats','stats.content_id', '=', 'avantio.booking_lists.accommodation_code')
                ->join('rates','rates.AccommodationId','=','avantio.booking_lists.accommodation_code')
                ->where('booking_lists.email', '=', $useremail)
                ->get();
        }else{
            $user = '';
        }

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

        return view('site.checkout.check_availability', compact('accommodationid', 'unavailableDates', 'startdate', 'enddate', 'userreservations'));
    }

    public function generatebillet(Request $request)
    {

        //https://github.com/jetimob/juno-sdk-php-laravel
        //https://www.brasilnaweb.com.br/blog/cartoes-de-credito-validos-para-teste-de-sistemas/

        $billing = new Billing();
        $billing->name = $request->name;
        $billing->document = $request->document;
        $billing->phone = $request->phone;
        $billing->email = $request->email;
        $billing->notify = true;

        $charge = new Charge();
        $charge->description    = $request->description;
        $charge->amount         = $request->amount;
        $charge->dueDate        = Juno::formatDate(2022, 2, 25);

//        $charge->maxOverdueDays = 99;
//        $charge->fine           = 9.9;
//        $charge->interest       = 9.9;

        $response = \Juno::request(new ChargeCreationRequest($charge, $billing), '20362C74C22CB65B370C0194CBEFAFA98D4E9211E868C55BF7B6DA73ABF4D212');

        echo $response;
    }
}
