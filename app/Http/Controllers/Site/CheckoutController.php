<?php

namespace App\Http\Controllers\Site;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;


class CheckoutController extends Controller
{

    public function index($accommodationid, $startdate = '', $enddate = '', $adults = '', $children = '', $ages = '')
    {

        $user = getUserData();
        $userreservations = getUserReservations();
        $userfuturereservations = getUserFutureReservations();
        $favorites = getUserFavorites();
        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();
        $services = getAllServices();

        $accommodation = \DB::table('accommodations')
            ->select('accommodations.*', 'descriptions.*', 'rates.*')
            ->Leftjoin('descriptions', 'descriptions.AccommodationId', '=', 'accommodations.AccommodationId')
            ->Leftjoin('rates', 'rates.AccommodationId', '=', 'accommodations.AccommodationId')
            ->where('accommodations.AccommodationId', '=', $accommodationid)
            ->first();

        $description = json_decode($accommodation->InternationalizedItem, true);
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


        return view('site.checkout.index', compact('description', 'features','accommodation', 'pictures', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));
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
        //print_r($info);

        $response = json_decode($response, true);

        //salva os dados do pedido
        $order = new Orders;
        $order->transactionId = $response['_embedded']['charges'][0]['id'];
        $order->amount = $request->amount;
        $order->status = "PENDING";
        $order->users_id = $request->user_id;
        $order->accommodationId = $request->accommodation_id;
        $order->checkin_date = $request->checkin_date;
        $order->checkout_date = $request->checkout_date;
        $order->due_date = $response['_embedded']['charges'][0]['dueDate'];
        $order->services = $request->services;
        $order->save();

        //faz uma pré reserva na avantio

//        try{
//
//            $client = new
//            \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');
//
//            $credentials = array(
//                "Language" => "EN",
//                "UserName" => "itsatentoapi_test",
//                "Password" => "testapixml"
//            );
//
//            $request = array(
//                "Credentials" => $credentials,
//                "BookingData" => [
//                    'Accommodation' => [
//                        'AccommodationCode' => 128498,//$content['accommodation_code'],
//                        'UserCode' => 1416325650,//$content['user_code'],
//                        'LoginGA' => 'itsvillas'//$content['login_ga']
//                    ],
//                    'Occupants' => [
//                        'AdultsNumber' => 1//$content['ocupantes']
//                    ],
//                    'ArrivalDate' => '2022-01-02',//$content['dt_inicial'],
//                    'DepartureDate' => '2022-01-05',//$content['dt_final']
//                    "ClientData" => [
//                        "Name" => 'Gabriel',
//                        "Surname" => 'Roloff',
//                        "DNI" => '03769214986',
//                        "Address" => 'Itajubá, 480',
//                        "Locality" => 'Portão',
//                        "PostCode" => '81070190',
//                        "City" => 'Curitiba',
//                        "Country" => 'Brazil',
//                        "Telephone" => '41988645007',
//                        "Telephone2" => '',
//                        "EMail" => 'garlof@gmail.com',
//                        "Fax" => '',
//                    ],
//                    "Board" => 'ROOM_ONLY',
//                    "BookingType" => 'UNPAID',
//                    "SendMailToOrganization" => 'true',
//                    "SendMailToTourist" => 'false',
//                    "PaymentMethod" => 1,
//                    "Comments" => '',
//                ],
//
//            );
//            return $client->SetBooking($request);
//        } catch(SoapFault $e){
//            return $e;
//        }
//        die();



        if($info['http_code'] == 200){
            $user = getUserData();
            $userreservations = getUserReservations();
            $userfuturereservations = getUserFutureReservations();
            $favorites = getUserFavorites();
            $recently_viewed = getUserRecentlyViewed();
            $surpriseme = generateSurprisemeUrl();
            $services = getAllServices();

            return view('site.checkout.billet', compact('response', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));
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
                'X-Idempotency-Key: 69F963C6-7487-4363-9406-A1DE2A9636D4',
                'Authorization: Bearer '.$authBearer,
                'Content-Type: application/json',
                'Cookie: AWSALBTG=jd3KOErEt5wkoKB4dmSD3pwVV+MV33KuQW79pNS2Y59QaVLBU+F69SwTuNrpQZh+OLZbu8MxpOS1mmH58JYQuLjFR8EGPAUZxPtUCY887Y+tH0TypIjIp+0y6/roOvwZKY9mkqR3EuRDY7qF9a2Znrz6t9L+q8TK1p0rc1hAOBvxYnlU0HM=; AWSALBTGCORS=jd3KOErEt5wkoKB4dmSD3pwVV+MV33KuQW79pNS2Y59QaVLBU+F69SwTuNrpQZh+OLZbu8MxpOS1mmH58JYQuLjFR8EGPAUZxPtUCY887Y+tH0TypIjIp+0y6/roOvwZKY9mkqR3EuRDY7qF9a2Znrz6t9L+q8TK1p0rc1hAOBvxYnlU0HM='
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);

        //print_r($info);

        if($info['http_code'] == 200){
            $user = getUserData();
            $userreservations = getUserReservations();
            $userfuturereservations = getUserFutureReservations();
            $favorites = getUserFavorites();
            $recently_viewed = getUserRecentlyViewed();
            $surpriseme = generateSurprisemeUrl();
            $services = getAllServices();
            $response = json_decode($response, true);

            return view('site.checkout.pix', compact('response', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));
        }else{
            echo $response;
        }

        curl_close($curl);

    }

    //Webhook para o pagamento da Juno
    public function juno_webhook(Request $request)
    {
            $data = request()->json()->all();
            $transactionId = $data['data'][0]['attributes']['charge']['id'];
            $status = $data['data'][0]['attributes']['status'];
            $due_date = $data['data'][0]['attributes']['charge']['dueDate'];
            Orders::where('transactionId', $transactionId)->update([
                "status" => $status,
                "due_date" => $due_date
            ]);

    }

}
