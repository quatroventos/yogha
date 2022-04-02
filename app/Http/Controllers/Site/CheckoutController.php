<?php

namespace App\Http\Controllers\Site;
use App\Models\Accommodations;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use App\Models\States;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Mostra página de checkout
     * @param $accommodationid
     * @param string $startdate
     * @param string $enddate
     * @param string $adults
     * @param string $children
     * @param string $ages
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index($accommodationid, $startdate = '', $enddate = '', $adults = '', $children = '', $ages = '')
    {
        $user = getUserData();
        $userreservations = getUserReservations();
        $userfuturereservations = getUserFutureReservations();
        $favorites = getUserFavorites();
        $recently_viewed = getUserRecentlyViewed();
        $surpriseme = generateSurprisemeUrl();
        $services = getAllServices();

        $accommodation = Accommodations::where('accommodations.AccommodationId', '=', $accommodationid)
            ->with('descriptions')
            //->with('rates')
            ->with('pictures')
            ->first();

        $description = json_decode($accommodation->LocalizationData, true);
        //$pictures = json_decode($accommodation->Pictures, true);
        $features = json_decode($accommodation->Features, true);


        //calcula o numero total de camas disponíveis

        /**
         *

         */

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

        //check accommodation
        $availableaccommodation = Accommodations::select("UserId", "Company")
            ->where("AccommodationId", "=", $accommodationid)
            ->first();
        try{

            $client = new
            \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');

            if(config('app.env') == 'production') {
                $credentials = array(
                    "Language" => "PT",
                    "UserName" => "yogha",
                    "Password" => "L7FzhH2022X+"
                );
            }else{
                $credentials = array(
                    "Language" => "EN",
                    "UserName" => "itsatentoapi_test",
                    "Password" => "testapixml"
                );
            }


            $post = array(
                "Credentials" => $credentials,
                'Criteria' => [
                    'Accommodation' => [
                        'AccommodationCode' => $accommodationid,
                        'UserCode' => $availableaccommodation->UserId,
                        'LoginGA' => $availableaccommodation->Company,
                    ],
                    'Occupants' => [
                        'AdultsNumber' => $adults,
                    ],
                    'DateFrom' => $startdate,
                    'DateTo' => $enddate,
                ],
            );

            //add ages to array
            $ages = rtrim($ages, ',');
            $agesarray = explode(',', $ages);

            foreach($agesarray as $key=>$age){
                $key = $key+1;
                $post['Criteria']['Occupants']["Child".$key."_Age"] = $age;
            }

            $result = $client->IsAvailable($post);

            /**
             * Parse do retorno do método IsAvailable da avantio
             */


            switch ($result->Available->AvailableCode){
                case 0:
                    $available = false;
                    $message = "Esta acomodação não está disponível para esta data, por favor, selecione uma data diferente.";
                    break;

                case 1:
                    $available = true;
                    $message = "";
                    break;

                case -2:
                    $available = false;
                    $message = "Esta acomodação está em processo de reserva, por favor, selecione outra data ou outra acomodação.";
                    break;

                case -5:
                    $available = false;
                    $message = "A quantidade mínima de dias não foi atingida para esta acomodação.";
                    break;

                case -3:
                    $available = false;
                    $message = "A data obrigatória de entrada não foi preenchida.";
                    break;

                case -4:
                    $available = false;
                    $message = "A data obrigatória de saída não foi preenchida.";
                    break;

                case -1:
                    $available = false;
                    $message = "The minimum days ONREQUEST are not fulfilled, like under petition.";
                    break;

                case -7:
                    $available = false;
                    $message = "O máximo de dias excede o permitido para esta acomodação.";
                    break;

                case -8:
                    $available = false;
                    $message = "Acomodação sem regras ocupacionais, selecione outra acomodação.";
                    break;

                case -10:
                    $available = false;
                    $message = "The marin of booking start is not fulfilled.";
                    break;

                case -9:
                    $available = false;
                    $message = "Acomodação indisponível para locação, selecione outra acomodação.";
                    break;

                case -99:
                    $available = false;
                    $message = "Ocupação máxima excedida.";
                    break;
            }


        } catch(SoapFault $e){
            $errors .= $e;
        }


        /**
         * Recupera preço de acordo com os dados do checkout
         */

        try{

            $client = new
            \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');

            if(config('app.env') == 'production') {
                $credentials = array(
                    "Language" => "PT",
                    "UserName" => "yogha",
                    "Password" => "L7FzhH2022X+"
                );
            }else{
                $credentials = array(
                    "Language" => "EN",
                    "UserName" => "itsatentoapi_test",
                    "Password" => "testapixml"
                );
            }

            $post = array(
                "Credentials" => $credentials,
                'Criteria' => [
                    'Accommodation' => [
                        'AccommodationCode' => $accommodationid,
                        'UserCode' => $availableaccommodation->UserId,
                        'LoginGA' => $availableaccommodation->Company,
                    ],
                    'Occupants' => [
                        'AdultsNumber' => $adults,
                    ],
                    'ArrivalDate' => $startdate,
                    'DepartureDate' => $enddate,
                ],
            );

            //add ages to array
            $ages = rtrim($ages, ',');
            $agesarray = explode(',', $ages);

            foreach($agesarray as $key=>$age){
                $key = $key+1;
                $post['Criteria']['Occupants']["Child".$key."_Age"] = $age;
            }

            $result = $client->GetBookingPrice($post);

            if ($result->BookingPrice->RoomOnlyFinal){
                $totalprice = $result->BookingPrice->RoomOnlyFinal;
                $currency = $result->BookingPrice->Currency;
                $bookingnotes =  $result->CancellationPolicies->Description;
                $termsandconditions = $result->TermsAndConditions;
            }
        } catch(SoapFault $e){
            $errors .= $e;
        }
        return view('site.checkout.index', compact('description', 'features','accommodation', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services', 'available', 'message' ,'totalprice', 'currency', 'bookingnotes', 'termsandconditions'));
    }

    /**
     * Checa se está disponível usando datas e número de hóspedes
     * @param string $accommodationid
     * @param string $startdate
     * @param string $enddate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function check_availability($accommodationid = '', $startdate = '', $enddate = '')
    {

        //se não houver datas definidas, inicia com a data de hoje e seta a data de saida para dois dias a partir de hoje
        $today = date("Y-m-d");
        if ($startdate == '') {
            $startdate = date('Y-m-d', strtotime($today . ' + 1 days'));
        }
        if ($enddate == '') {
            $enddate = date('Y-m-d', strtotime($today . ' + 3 days'));
        }

        $availability = \DB::table('availabilities')
            ->where('AccommodationId', '=', $accommodationid)
            ->where('State', '=', 'UNAVAILABLE')
            ->get();


        if (count($availability) != 0) {
            //cria array com o range de datas
            //$unavailableDates = array();
            $unavailableDates = "[";

            foreach ($availability as $avail) {
                $start = strtotime($avail->StartDate);
                $last = strtotime($avail->EndDate);
                $unavailableDates .= "['".date("Y-m-d", $start)."','".date("Y-m-d", $last)."'],";
            }
            $unavailableDates .= "]";
            //$unavailableDates = json_encode($unavailableDates);
            //echo $unavailableDates;

        } else {
            $unavailableDates = "";
        }

        return view('site.checkout.check_availability', compact('accommodationid', 'unavailableDates', 'startdate', 'enddate'));
    }


    /**
     * Gera pagamento via cartão de crédito Juno
     * @param Request $request
     */
    public function generatecard(Request $request){

        $curl = curl_init();

        $resource_token = "6208E5469C507A8B1F5485A08A2985122F6F32BCB78B90599B02ED2C6EA7FDCF";

        $errors = "";

        $curl = curl_init();

        //get bearer token
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
        $authBearerArray = json_decode($response);

        if($authBearerArray->access_token != "") {

            $authBearer = $authBearerArray->access_token;
            $duedate = Carbon::now()->addDays(5)->format('Y-m-d');
            $birthday = implode('-', array_reverse(explode('/', $request->birthday)));
            $city = Cities::where('id', $request->city)->first();
            $estate = States::where('id', $request->state)->first();
            $country = Countries::where('id', $request->country)->first();

            $city = $city->nome;
            $estate = $estate->uf;
            $country = $country->nome;

            //gera a cobrança
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://boletobancario.com/api-integration/charges',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_POSTFIELDS => '{
                     "charge": {
                        "description": "' . $request->description . '",
                        "totalAmount": ' . $request->amount . ',
                        "dueDate": "' . $duedate . '",
                        "installments": ' . $request->installments . ',
                        "maxOverdueDays": 1,
                        "fine": "1.00",
                        "interest": "2.00",
                        "paymentTypes": [
                            "CREDIT_CARD"
                        ],
                        "paymentAdvance": false
                    },
                    "billing": {
                        "name": "' . $request->name . '",
                        "document": "' . preg_replace('/[^0-9]/', '', $request->document) . '",
                        "email": "' . $request->email . '",
                        "birthDate": "' . $birthday . '",
                        "notify": true
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'X-Api-Version: 2',
                    'X-Resource-Token: ' . $resource_token,
                    'Authorization: Bearer ' . $authBearer,
                    'Content-Type: application/json',
                    'Cookie: AWSALBTG=Ob01OcNLW6VDg96uTY0A3vr/vhKGJoXyZ93nMD3vJqBA4SmYqOOCDG44mJJXEgAA+qUVg+ZBLvlpHmxLS+Fk79ZhdQ+HGNGCB2+0AiiGfEUbz5iALWM3iGMT6wmHJObncG3jkz2TX3bYQhoedI5fZKewUgXiJrjWgZGuy8hv6guL4BB6F9Q=; AWSALBTGCORS=Ob01OcNLW6VDg96uTY0A3vr/vhKGJoXyZ93nMD3vJqBA4SmYqOOCDG44mJJXEgAA+qUVg+ZBLvlpHmxLS+Fk79ZhdQ+HGNGCB2+0AiiGfEUbz5iALWM3iGMT6wmHJObncG3jkz2TX3bYQhoedI5fZKewUgXiJrjWgZGuy8hv6guL4BB6F9Q='
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response, true);
            $paymentid = $response['_embedded']['charges'][0]['id'];

            //efetua o pagamento
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://boletobancario.com/api-integration/payments',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                "chargeId":"'.$paymentid.'",
                "creditCardDetails": {
                    "creditCardHash": "'.$request->hash.'"
                },"billing": {
                    "email": "'.$request->email.'",
                    "address": {
                        "street": "'.$request->street.'",
                        "number": "'.$request->number.'",
                        "complement": "'.$request->complement.'",
                        "neighborhood": "'.$request->district.'",
                        "city": "'.$city.'",
                        "state": "'.$estate.'",
                        "postCode": "'.str_replace('-','', $request->zip_code).'"
                    }
                }
            }',
                CURLOPT_HTTPHEADER => array(
                    'X-Api-Version: 2',
                    'X-Resource-Token: ' . $resource_token,
                    'Authorization: Bearer ' . $authBearer,
                    'Content-Type: application/json',
                    'Cookie: AWSALBTG=Q+s42W00POYi+Ee771bJ2GYCWSbcBb0txgvPygWTTjqLCMZvfegZs6ZpMXeXsKYNehmUUuIpj7Nr79H8WyCETQzGt1Yf/Xf3Unn2EYuGIZ5pEe4rD+6F8SE1VDG+4fP23UZokY93pI8llTkqSRY2EyjD/XIlsLQw9MkIY2Ybyr6hAvqk8FQ=; AWSALBTGCORS=Q+s42W00POYi+Ee771bJ2GYCWSbcBb0txgvPygWTTjqLCMZvfegZs6ZpMXeXsKYNehmUUuIpj7Nr79H8WyCETQzGt1Yf/Xf3Unn2EYuGIZ5pEe4rD+6F8SE1VDG+4fP23UZokY93pI8llTkqSRY2EyjD/XIlsLQw9MkIY2Ybyr6hAvqk8FQ='
                ),
            ));


            echo $request->hash ."<br>" ;
            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;


            die();
        }
    }


    /**
     * Gera boleto pela Juno
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function generatebillet(Request $request)
    {
        $resource_token = "6208E5469C507A8B1F5485A08A2985122F6F32BCB78B90599B02ED2C6EA7FDCF";

        $errors = "";

        $curl = curl_init();

        //get bearer token
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
        $authBearerArray = json_decode($response);

        if($authBearerArray->access_token != "") {
            //generate billet
            $authBearer = $authBearerArray->access_token;
            $duedate = Carbon::now()->addDays(5)->format('Y-m-d');
            $birthday = implode('-', array_reverse(explode('/', $request->birthday)));
            $city = Cities::where('id', $request->city)->first();
            $country = Countries::where('id', $request->country)->first();

            $city = $city->nome;
            $country = $country->nome;

            //$curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://sandbox.boletobancario.com/api-integration/charges',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "charge": {
                    "description": "' . $request->description . '",

                    "references": [
                        "A vista"
                    ],
                    "amount": ' . $request->amount . ',
                    "dueDate": "' . $duedate . '",
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
                        "name": "' . $request->name . '",
                        "document": "' . preg_replace('/[^0-9]/', '', $request->document) . '",
                        "email": "' . $request->email . '",
                        "birthDate": "' . $birthday . '",
                        "notify": true
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'X-Api-Version: 2',
                    'X-Resource-Token: ' . $resource_token,
                    'Authorization: Bearer ' . $authBearer,
                    'Content-Type: application/json',
                    'Cookie: AWSALBTG=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY=; AWSALBTGCORS=iewR9EOimhsRr5/ukIjBPvL3gg2ESPucPYu24PfNY1VJY4n0SqFaB1RkheS8p/mO60abZ1CVykwexvZ8ObSvxRnB1aQJP4Z6HVyNr6Ton1J3CliDmafakgOSOiW+H5s4XTbY/PqjJkcuO4ioxf+bHObV/0/txMYo+L11qvSczAztT3kWhSY='
                ),
            ));

            $response = curl_exec($curl);
            $response = json_decode($response, true);
            curl_close($curl);

            if(!isset($response['_embedded']['charges'][0]['id'])){
                return back()->withErrors(['msg' =>  $response['details'][0]['message']]);
            }else{

                    /**
                     * Bloqueia temporariamente a reserva até o pagamento
                     **/
                    try{

                        $client = new
                        \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');

                        if(config('app.env') == 'production') {
                            $credentials = array(
                                "Language" => "PT",
                                "UserName" => "yogha",
                                "Password" => "L7FzhH2022X+"
                            );
                        }else{
                            $credentials = array(
                                "Language" => "EN",
                                "UserName" => "itsatentoapi_test",
                                "Password" => "testapixml"
                            );
                        }

                        $post = array(
                            "Credentials" => $credentials,
                            "BookingData" => [
                                'Accommodation' => [
                                    'AccommodationCode' => $request->accommodation_code,
                                    'UserCode' => $request->user_code,
                                    'LoginGA' => $request->login_ga
                                ],
                                'Occupants' => [
                                    'AdultsNumber' => $request->adultsnumber,
                                    'ChildrenNumber' => $request->childrennumber,
                                ],
                                'ArrivalDate' => $request->checkin_date,
                                'DepartureDate' => $request->checkout_date,
                                "ClientData" => [
                                    "Name" => $request->name,
                                    "Surname" => $request->surname,
                                    "DNI" => $request->document,
                                    "Address" => $request->street,
                                    "Locality" => $request->district,
                                    "PostCode" => $request->zip_code,
                                    "City" => $city,
                                    "Country" => $country,
                                    "Telephone" => $request->phone,
                                    "Telephone2" => '',
                                    "EMail" => $request->email,
                                    "Fax" => '',
                                ],
                                "Board" => $request->board,
                                "BookingType" => 'UNPAID',
                                "SendMailToOrganization" => 0,
                                "SendMailToTourist" => 1,
                                "PaymentMethod" => 1,
                                "Comments" => '',
                            ],

                        );

                        $reservation = $client->SetBooking($post);

                    } catch(SoapFault $e){
                        $errors .= $e;
                    }

                    /**
                     * Insere o pedido (reserva) no banco de dados
                     */
                    $order = new Orders;
                    $order->transactionId = $response['_embedded']['charges'][0]['id'];
                    $order->amount = $request->amount;
                    $order->status = "PENDING";
                    $order->users_id = $request->user_id;
                    $order->accommodationId = $request->accommodation_code;
                    $order->checkin_date = $request->checkin_date;
                    $order->checkout_date = $request->checkout_date;
                    $order->due_date = $response['_embedded']['charges'][0]['dueDate'];
                    $order->services = $request->services;
                    $order->localizer = $reservation->Localizer->Localizator;
                    $order->booking_code = $reservation->Localizer->BookingCode;
                    $order->payment_type = 'billet';
                    $order->save();

                    $user = getUserData();
                    $userreservations = getUserReservations();
                    $userfuturereservations = getUserFutureReservations();
                    $favorites = getUserFavorites();
                    $recently_viewed = getUserRecentlyViewed();
                    $surpriseme = generateSurprisemeUrl();
                    $services = getAllServices();

                    return view('site.checkout.billet', compact('response', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));


            }
        }
    }

    /**
     * Gera pagamento via pix pela Juno
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */

    public function generatepix(Request $request)
    {

        //Gerar chave de idempotencia (apenas uma vez no para toda a integração)
        //$uuid = Uuid::uuid4();
        //echo $uuid;
        //die();

        $curl = curl_init();

        $resource_token = "6208E5469C507A8B1F5485A08A2985122F6F32BCB78B90599B02ED2C6EA7FDCF";
        $city = Cities::where('id', $request->city)->first();
        $country = Countries::where('id', $request->country)->first();
        $today = date("Y-m-d");

        $city = $city->nome;
        $country = $country->nome;

        $errors = "";

        $curl = curl_init();

        //get bearer token
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
        $authBearerArray = json_decode($response);

        $authBearer = $authBearerArray->access_token;

        if($authBearerArray->access_token != "") {

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://sandbox.boletobancario.com/api-integration/pix-api/v2/cob/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                                          "calendario": {
                                            "expiracao": 86400
                                          },
                                          "devedor": {
                                            "cpf": "' . preg_replace('/[^0-9]/', '', $request->document) . '",
                                            "nome": "' . $request->name . '"
                                          },
                                          "valor": {
                                            "original": "' . $request->amount . '"
                                          },
                                          "chave": "21b75b04-6bdf-40f0-aa0b-ad4d62306be4",
                                          "solicitacaoPagador": "' . $request->description . '",
                                          "infoAdicionais": [
                                            {
                                              "nome": "Descriçãi",
                                              "valor": "' . $request->description . '"
                                            }
                                          ]
                                        }',


                CURLOPT_HTTPHEADER => array(
                    'X-Api-Version: 2',
                    'X-Resource-Token:'.$resource_token,
                    'Authorization: Bearer'.$authBearer,
                    'Content-Type: application/json',
                    'Cookie: AWSALBTG=f3i+MgXX9j18oRGOfAOx7A68TBuhfW8VzVR+iK8DEqQvfxruar8cnYCYkTETnyqe+mGXoyX2UUYnK3BTE55Ko15YI1eBsJf3ekFLXo5iT8I1GBGJRVnQQlKrY5JGBnPbyxjF0TB3FyPrKDAHiCDotYWdeppCDeW4+6HU+1kcJTDb5a1iLyE=; AWSALBTGCORS=f3i+MgXX9j18oRGOfAOx7A68TBuhfW8VzVR+iK8DEqQvfxruar8cnYCYkTETnyqe+mGXoyX2UUYnK3BTE55Ko15YI1eBsJf3ekFLXo5iT8I1GBGJRVnQQlKrY5JGBnPbyxjF0TB3FyPrKDAHiCDotYWdeppCDeW4+6HU+1kcJTDb5a1iLyE='
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response, true);

            //print_r($response);

            $txid = $response['txid'];

            //recupera imagem em base64 usando a api da juno
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://sandbox.boletobancario.com/api-integration/pix-api/qrcode/v2/'.$txid.'/imagem',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'X-Api-Version: 2',
                    'X-Resource-Token:'.$resource_token,
                    'Authorization: Bearer '.$authBearer,
                    'Cookie: AWSALBTG=cVhj1q8z0FFewkZElgDvknG7T3r4vIhpsCm74Tqeffpvq1bQRnytnnZFcnSmnJLcXuOSTZVc3hM1GzcaJR+jxNer526/qYj8xp/ztzy7cEDI+5phaGX47yWz/U7snTLhV6H//HCww8dapAyUiOPwJMtohvJckcgqRwufaRQChhfP+HETQrA=; AWSALBTGCORS=cVhj1q8z0FFewkZElgDvknG7T3r4vIhpsCm74Tqeffpvq1bQRnytnnZFcnSmnJLcXuOSTZVc3hM1GzcaJR+jxNer526/qYj8xp/ztzy7cEDI+5phaGX47yWz/U7snTLhV6H//HCww8dapAyUiOPwJMtohvJckcgqRwufaRQChhfP+HETQrA='
                ),
            ));

            $response = json_decode(curl_exec($curl), true);

            curl_close($curl);


            $qrcode = "data:image/png;base64,".$response['imagemBase64'];
            $copiacola =  $response['qrcodeBase64'];


            /**
             * Bloqueia temporariamente a reserva até o pagamento
             **/
            try {

                $client = new
                \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');

                if (config('app.env') == 'production') {
                    $credentials = array(
                        "Language" => "PT",
                        "UserName" => "yogha",
                        "Password" => "L7FzhH2022X+"
                    );
                } else {
                    $credentials = array(
                        "Language" => "EN",
                        "UserName" => "itsatentoapi_test",
                        "Password" => "testapixml"
                    );
                }

                $post = array(
                    "Credentials" => $credentials,
                    "BookingData" => [
                        'Accommodation' => [
                            'AccommodationCode' => $request->accommodation_code,
                            'UserCode' => $request->user_code,
                            'LoginGA' => $request->login_ga
                        ],
                        'Occupants' => [
                            'AdultsNumber' => $request->adultsnumber,
                            'ChildrenNumber' => $request->childrennumber,
                        ],
                        'ArrivalDate' => $request->checkin_date,
                        'DepartureDate' => $request->checkout_date,
                        "ClientData" => [
                            "Name" => $request->name,
                            "Surname" => $request->surname,
                            "DNI" => $request->document,
                            "Address" => $request->street,
                            "Locality" => $request->district,
                            "PostCode" => $request->zip_code,
                            "City" => $city,
                            "Country" => $country,
                            "Telephone" => $request->phone,
                            "Telephone2" => '',
                            "EMail" => $request->email,
                            "Fax" => '',
                        ],
                        "Board" => $request->board,
                        "BookingType" => 'UNPAID',
                        "SendMailToOrganization" => 0,
                        "SendMailToTourist" => 1,
                        "PaymentMethod" => 1,
                        "Comments" => '',
                    ],

                );

                $reservation = $client->SetBooking($post);

            } catch (SoapFault $e) {
                $errors .= $e;
            }

            /**
             * Insere o pedido (reserva) no banco de dados
             */
            $order = new Orders;
            $order->transactionId = $txid;
            $order->amount = $request->amount;
            $order->status = "PENDING";
            $order->users_id = $request->user_id;
            $order->accommodationId = $request->accommodation_code;
            $order->checkin_date = $request->checkin_date;
            $order->checkout_date = $request->checkout_date;
            $order->due_date = $today;
            $order->services = $request->services;
            $order->localizer = $reservation->Localizer->Localizator;
            $order->booking_code = $reservation->Localizer->BookingCode;
            $order->payment_type = 'pix';
            $order->save();

            $user = getUserData();
            $userreservations = getUserReservations();
            $userfuturereservations = getUserFutureReservations();
            $favorites = getUserFavorites();
            $recently_viewed = getUserRecentlyViewed();
            $surpriseme = generateSurprisemeUrl();
            $services = getAllServices();

            return view('site.checkout.pix', compact('qrcode', 'copiacola', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));

        }

    }

    /**
     * Webhook para o retorno da api da Juno
     * CONFIGURAR NA JUNO O RETORNO CORRETO
     * @param Request $request
     */
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


    /**
     * Cancela uma reserva
     * @param $bookingcode
     * @param $localizator
     * @return SoapFault|\Exception|string|void
     */
    public function cancelbooking($bookingcode, $localizator, $hash){
        try {

            $client = new
            \SoapClient('http://ws.avantio.com/soap/vrmsConnectionServices.php?wsdl');

            if(config('app.env') == 'production') {
                $credentials = array(
                    "Language" => "PT",
                    "UserName" => "yogha",
                    "Password" => "L7FzhH2022X+"
                );
            }else{
                $credentials = array(
                    "Language" => "EN",
                    "UserName" => "itsatentoapi_test",
                    "Password" => "testapixml"
                );
            }

            $request = array(
                "Credentials" => $credentials,
                "BookingCode" => $bookingcode,
                "Localizer" => [
                    "Localizator" => $localizator
                ],
                "Comments" => "testing",
                "SendMailToOrganization" => 0,
                "SendMailToTourist" => 1
            );

            $return =  $client->CancelBooking($request);

            if($return->Succeed == 1){
                Orders::where('localizer', $localizator)->update(array('status' => 'CANCELED'));
                return "Reserva cancelada";
            }

        } catch (SoapFault $e) {
            return $e;
        }
    }

}
