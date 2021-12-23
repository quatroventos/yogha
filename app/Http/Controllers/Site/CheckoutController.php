<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jetimob\Juno\Juno;
use Jetimob\Juno\Lib\Model\Billing;
use Jetimob\Juno\Lib\Model\Charge;
use Jetimob\Juno\Lib\Http\Charge\ChargeCreationRequest;


class CheckoutController extends Controller
{

    public function index($accommodationid, $startdate = '', $enddate = '', $adults = '', $children = '', $ages = '')
    {
        $today = date("Y-m-d");

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
            $userfuturereservations =  \DB::table('avantio.booking_lists')
                //TODO: puxar dados via api
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

        return view('site.checkout.index', compact('accommodation', 'pictures', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations'));
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
            $userreservations = '';
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

    public function generatecard(Request $request)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://staging.ebanx.com.br/ws/direct',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => '{
                "integration_key": "7d8415bc1a9e2adb27935c16c6cd63719ba14173b92ac7a4fb5eaca47b56a87444e24ba24ca2a979bc25d91d3fecc96fa6a5",
                "operation": "request",
                "payment": {
                    "name": "'.$request->name.'",
                    "email": "'.$request->email.'",
                    "document": "'.$request->document.'",
                    "address": "'.$request->address.'",
                    "street_number": "'.$request->number.'",
                    "city": "'.$request->city.'",
                    "state": "'.$request->state.'",
                    "zipcode": "'.$request->zip_code.'",
                    "country": "'.$request->country.'",
                    "phone_number": "'.$request->phone.'",
                    "payment_type_code": "creditcard",
                    "merchant_payment_code": "3ad1f4096a2",
                    "currency_code": "BRL",
                    "instalments": '.$request->instalments.',
                    "amount_total": '.$request->amount.',
                    "creditcard": {
                        "card_number": "'.$request->card_number.'",
                        "card_name": "'.$request->card_name.'",
                        "card_due_date": "'.$request->card_duetade.'",
                        "card_cvv": "'.$request->card_cvv.'"
                    }
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: AWSALB=bTEFJt7TM+9Z2QowvT6swovaMNKEnSxBcgyaIgTW3Q51hY5bWz/uyh29iIxLB7AAi7EY/iHHEQJTergBFJHl0kpyMteBuBfDj//5F6jR8C4juSyFa4HfA85/mKPY; AWSALBCORS=bTEFJt7TM+9Z2QowvT6swovaMNKEnSxBcgyaIgTW3Q51hY5bWz/uyh29iIxLB7AAi7EY/iHHEQJTergBFJHl0kpyMteBuBfDj//5F6jR8C4juSyFa4HfA85/mKPY'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
    public function generatebillet(Request $request)
    {
        //https://www.brasilnaweb.com.br/blog/cartoes-de-credito-validos-para-teste-de-sistemas/

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.boletobancario.com/authorization-server/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic WGRzR0J3VFJPbTAyT3RPMjo4JUEyS19DOigob3trLn47e3MjdUh8cDUmOFVbNWt7Iw==',
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: AWSALBTG=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY=; AWSALBTGCORS=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $authBearerArray = json_decode($response);

        $authBearer = $authBearerArray->access_token;
        $duedate = Carbon::now()->addDays(5)->format('Y-m-d');
        $birthday = implode('-', array_reverse(explode('/', $request->birthday)));

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.boletobancario.com/api-integration/charges',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "charge": {
                "description": "'.$request->description.'",

                "references": [
                    "A vista"
                ],
                "amount": '.$request->amount.',
                "dueDate": "'.$duedate.'",
                "installments": 1,
                "maxOverdueDays": 10,
                "fine": "1.00",
                "interest": "2.00",
                "discountAmount": "0",
                "discountDays": 0,
                "paymentTypes": [
                    "BOLETO"
                ],
                "paymentAdvance": false
                },
                "billing": {
                    "name": "'.$request->name.'",
                    "document": "'.$request->document.'",
                    "email": "'.$request->email.'",
                    "birthDate": "'.$request->birthdate.'",
                    "notify": true
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'X-Api-Version: 2',
                'X-Resource-Token: 6208E5469C507A8BA724994B4E5D5DB1E255775316D87C510AAB5FC0E850DEF2',
                'Authorization: Bearer '.$authBearer,
                'Content-Type: application/json',
                'Cookie: AWSALBTG=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY=; AWSALBTGCORS=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY='
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        print_r($info);

        $response = json_decode($response);

        echo  "<pre>";
            print_r($response);
        echo  "</pre>";

        if($info['http_code'] == 200){
            echo "ok!";
        }else{
            echo $response->details[0]->message;
        }

        curl_close($curl);

    }

    public function generatepix(Request $request)
    {
        //https://www.brasilnaweb.com.br/blog/cartoes-de-credito-validos-para-teste-de-sistemas/
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.boletobancario.com/authorization-server/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic WGRzR0J3VFJPbTAyT3RPMjo4JUEyS19DOigob3trLn47e3MjdUh8cDUmOFVbNWt7Iw==',
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: AWSALBTG=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY=; AWSALBTGCORS=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $authBearerArray = json_decode($response);

        $authBearer = $authBearerArray->access_token;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.boletobancario.com/api-integration/pix/keys',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "type": "RANDOM_KEY"
            }',
            CURLOPT_HTTPHEADER => array(
                'X-Api-Version: 2',
                'X-Resource-Token: 6208E5469C507A8BA724994B4E5D5DB1E255775316D87C510AAB5FC0E850DEF2',
                'Authorization: Bearer '.$authBearer,
                'Content-Type: application/json',
                'Cookie: AWSALBTG=jd3KOErEt5wkoKB4dmSD3pwVV+MV33KuQW79pNS2Y59QaVLBU+F69SwTuNrpQZh+OLZbu8MxpOS1mmH58JYQuLjFR8EGPAUZxPtUCY887Y+tH0TypIjIp+0y6/roOvwZKY9mkqR3EuRDY7qF9a2Znrz6t9L+q8TK1p0rc1hAOBvxYnlU0HM=; AWSALBTGCORS=jd3KOErEt5wkoKB4dmSD3pwVV+MV33KuQW79pNS2Y59QaVLBU+F69SwTuNrpQZh+OLZbu8MxpOS1mmH58JYQuLjFR8EGPAUZxPtUCY887Y+tH0TypIjIp+0y6/roOvwZKY9mkqR3EuRDY7qF9a2Znrz6t9L+q8TK1p0rc1hAOBvxYnlU0HM='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


    }
}
