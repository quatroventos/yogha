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
        return view('site.checkout.index', compact('description', 'features','accommodation', 'pictures', 'totalcamas', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services', 'available', 'message' ,'totalprice', 'currency', 'bookingnotes', 'termsandconditions'));
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
            $unavailableDates = array();
            $current = strtotime($availability[0]->StartDate);
            $last = strtotime($availability[0]->EndDate);

            while ($current <= $last) {

                $unavailableDates[] = date("Y-m-d", $current);
                $current = strtotime("+1 day", $current);
            }

            $unavailableDates = json_encode($unavailableDates);
             //dd($unavailableDates);

        } else {
            $unavailableDates = "";
        }

        return view('site.busca.filtro', compact('accommodationid', 'unavailableDates', 'startdate', 'enddate'));
    }


    /**
     * Gera pagamento via cartão de crédito Ebanx
     * @param Request $request
     */
    public function generatecard(Request $request)
    {

        $duedate = Carbon::now()->addDays(5)->format('Y-m-d');
        $birthday = implode('-', array_reverse(explode('/', $request->birthday)));
        $city = Cities::where('id', $request->city)->first();
        $state = States::where('id', $request->state)->first();
        $country = Countries::where('id', $request->country)->first();
        $code = sha1(time());

        $city = $city->nome;
        $state = $state->uf;
        $country = $country->sigla;

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
                    "address": "'.$request->street.'",
                    "street_number": "'.$request->number.'",
                    "city": "'.$city.'",
                    "state": "'.$state.'",
                    "zipcode": "'.$request->zip_code.'",
                    "country": "'.$country.'",
                    "phone_number": "'.$request->phone.'",
                    "payment_type_code": "creditcard",
                    "merchant_payment_code": "'.$code.'",
                    "currency_code": "BRL",
                    "instalments": 1,
                    "amount_total": '.$request->amount.',
                    "creditcard": {
                        "card_number": "'.$request->card_number.'",
                        "card_name": "'.$request->card_name.'",
                        "card_due_date": "'.$request->card_due_date.'",
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

        $response = json_decode($response, true);

            if($response['status'] == "ERROR"){
                return back()->withErrors(['msg' =>  $response['status_message']]);
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
                            "BookingType" => 'PAID',
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
                $order->transactionId = $response['payment']['hash'];
                $order->amount = $request->amount;
                $order->status = "CONFIRMED";
                $order->users_id = $request->user_id;
                $order->accommodationId = $request->accommodation_code;
                $order->checkin_date = $request->checkin_date;
                $order->checkout_date = $request->checkout_date;
                $order->due_date = $response['payment']['due_date'];
                $order->services = $request->services;
                $order->localizer = $reservation->Localizer->Localizator;
                $order->booking_code = $reservation->Localizer->BookingCode;
                $order->save();

                $user = getUserData();
                $userreservations = getUserReservations();
                $userfuturereservations = getUserFutureReservations();
                $favorites = getUserFavorites();
                $recently_viewed = getUserRecentlyViewed();
                $surpriseme = generateSurprisemeUrl();
                $services = getAllServices();

                return view('site.checkout.card', compact('response', 'recently_viewed', 'surpriseme', 'user', 'favorites', 'userreservations','userfuturereservations','services'));


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
                        "document": "' . $request->document . '",
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
    public function cancelbooking($bookingcode, $localizator){
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
