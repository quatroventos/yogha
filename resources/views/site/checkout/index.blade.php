@extends('site.layouts.site')
@section('content')


    @env('local')
        <div class="alerta ativo" style="color: white; background: red; top:0; height: 10px; width: 30%; margin:10px auto; opacity:.5;"> <i class="fa-solid fa-vial"></i> Ambiente de testes </div>
    @endenv

<!-- CONTEUDO -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="fixo-t">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col grow-0 px-0">
                <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col align-self-center *justify-content-center">
                <h3 class="text-center"><strong>Confirmar e pagar</strong></h3>
            </div>
            <div class="col grow-0 px-0">
                <span href="#!" class="btn btn-2 btn-ico"></span>
            </div>
        </div>
    </div>
</section>

@if($errors->any())
    <div class="alert-danger" style="position:fixed; top:0; width: 100%; z-index: 9999; padding:14px;">
        <h4>{{$errors->first()}}</h4>
    </div>
@endif

<section>
    <div class="container">
        <div class="row descricao">
            <div class="col-12 col-sm-4">
                <div class="row mb-30">
                    <div class="col grow-0 pe-0">
                        <picture class="pic-m" style="background-image: url({{$pictures['Picture'][0]['OriginalURI'] ?? ''}});"></picture>
                    </div>
                    <div class="col">
                        <p></p>
                        <p class="texto-m"><strong>{{$accommodation->UserKind}} no <a href="/searchbydistrict/{{strtolower($description[1]['District']['Name'])}}">{{$description[1]['District']['Name'] ?? ''}}</a> em {{$description[1]['City']['Name'] ?? ''}} - {{$description[1]['Region']['Name'] ?? ''}} com {{$features['Distribution']['Bedrooms']}} quarto(s)</strong></p>
                        <h2 class="mb-5"><strong>{{$accommodation->AccommodationName}}</strong></h2>
                        <p class="texto-m">
                            @if(empty($accommodation->Capacity) === false)
                                {{$accommodation->Capacity}} hóspedes •
                            @endif
                            @if(empty($features['Distribution']['Bedrooms']) === false)
                                {{$features['Distribution']['Bedrooms']}} quartos •
                            @endif
                            @if($totalcamas > 0)
                                {{$totalcamas}} camas
                            @endif
{{--                            @if(empty($features['Distribution']['Toilets']) === false)--}}
{{--                                {{$features['Distribution']['Toilets']}} Banheiros--}}
{{--                            @endif--}}
                        </p>
                        <small class="btn-link texto-m px-0"><i class="icone-p uil uil-phone"></i> <strong>Reservar por telefone: 41 9 9999-9999</strong></small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Sua estadia</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                        <div class="col">
                            <h4 class="texto-m mb-5"><strong>Datas</strong></h4>
                            <p class="mb-0 {{$available === false && $message != "Ocupação máxima excedida." ? "text-danger" : ""}}">{{date_format(date_create(Request::segment(3)),"d/m/y")}} → {{date_format(date_create(Request::segment(4)),"d/m/y")}}</p>
                            @if($available == false && $message != "Ocupação máxima excedida.")
                                <small class="text-danger">{{$message}}</small>
                            @endif
                        </div>
                        <div class="col grow-0">
                            @auth
                                <a href="{{URL::to('/check_availability/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/'.Request::segment(5).'/'.Request::segment(6).'/'.Request::segment(7))}}" class="btn-link btn-p px-0">Editar</a>
                            @else
                                <a href="{{URL::to('/login')}}" class="btn-link btn-p px-0" >Editar</a>
                            @endauth
                        </div>

                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <h4 class="texto-m mb-5"><strong>Hóspedes</strong></h4>
                        <?php
                        if(Request::segment(7) != ""){
                            $hospedes = Request::segment(5) + Request::segment(6);
                        }else{
                            $hospedes = Request::segment(5);
                        }
                        ?>
                        <p class="mb-0 {{$available === false && $message == "Ocupação máxima excedida." ? "text-danger" : ""}}">{{$hospedes}} hóspede{{($hospedes > 1 ? 's' : '')}}</p>
                        @if($available == false && $message == "Ocupação máxima excedida.")
                            <small class="text-danger">{{$message}}</small>
                        @endif
                    </div>
                    <div class="col grow-0">
                        <div class="col grow-0">
                            @auth
                                <a href="{{URL::to('/check_availability/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/'.Request::segment(5).'/'.Request::segment(6).'/'.Request::segment(7))}}" class="btn-link btn-p px-0">Editar</a>
                            @else
                                <a href="{{URL::to('/login')}}" class="btn-link btn-p px-0" >Editar</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @if($available == true)
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Detalhes do preço</strong></h3>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col">
                        <ul class="gap-5 texto-m">
                            <?php $noites = round((strtotime(Request::segment(4)) - strtotime(Request::segment(3)))/86400, 1); ?>
                            <li>Estadia: {{$noites}} noites para {{$hospedes}} hóspedes</li>
                                <?php $total = 0 ?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                            <li>{{ $details['title'] }}</li>
                                    @endforeach
                                @endif
                            <li><strong>Total ({{$currency}})</strong></li>
                        </ul>
                    </div>
                    <div class="col grow-1">
                        <ul class="gap-5 text-end texto-m">
                            <li>{{$totalprice}}</li>

                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <li>R${{ $details['price'] }}</li>
                                @endforeach
                            @endif
                            <li><strong>{{$totalprice + $total}}</strong></li>
                            <?php $amount = $totalprice + $total; ?>
                        </ul>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col d-flex justify-content-end">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja" aria-expanded="false" class="btn btn-4 btn-p ms-auto switch">Adicionar serviço</a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Dados pessoais</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Nome</strong></h4>
                        <p class="mb-0">{{$user->name}} {{$user->surname}}</p>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Endereço</strong></h4>
                        <p class="mb-0">{{$user->street}}, {{$user->number}} - {{$user->complement ?? ''}} - {{$user->district}},
                            {{$user->city}} - {{$user->state}}, {{$user->zip_code}}</p>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Contato</strong></h4>
                        <p class="mb-0">{{$user->phone}}</p>
                        <p class="mb-0">{{$user->email}}</p>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <a href="{{URL::to('user/edit/'.$user->id)}}" class="btn-link btn-p px-0"><strong>Editar dados</strong></a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Notas adicionais</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col pe-0 grow-0">
                        <i class="icone-g cor-marrom uil uil-calender"></i>
                    </div>
                    <div class="col">
                        <p class="mb-0">
                            {{$bookingnotes}}
                            <a href="{{$termsandconditions}}" class="btn-link texto-m px-0" target="_blank">Termos e condições</a>
                        </p>

                    </div>
                </div>

                <hr class="mb-30">

                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Pagar com</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                            <ul class="gap-10">
                                <li>
                                    <a href="#!" data-bs-toggle="collapse" data-bs-target=".campos-cartao" class="row texto-marrom align-items-center">
                                        <div class="col grow-0 pe-0">
                                            <picture><i class="fa fa-credit-card" aria-hidden="true" style="padding:11px;"></i></picture>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Cartão de crédito</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="campos-cartao collapse">
                                    <form method="post" action="{{ route('generate.card') }}" class="pt-10 mb-30" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="description" value="{{$noites}} noites em {{$accommodation->AccommodationName}} para {{$hospedes}} pessoas.">
                                        <input type="hidden" name="amount" value="{{$amount}}">
                                        {{--Accommoda info--}}
                                        <input type="hidden" name="accommodation_code" value="{{$accommodation->AccommodationId}}">
                                        <input type="hidden" name="user_code" value="{{$accommodation->UserId}}">
                                        <input type="hidden" name="login_ga" value="{{$accommodation->Company}}">
                                        {{--Reservati nfo--}}
                                        <input type="hidden" name="adultsnumber" value="{{Request::segment(5)}}">
                                        <input type="hidden" name="childrennumber" value="{{Request::segment(6)}}">
                                        <input type="hidden" name="checkin_date" value="{{Request::segment(3)}}">
                                        <input type="hidden" name="checkout_date" value="{{Request::segment(4)}}">
                                        {{--User info--}}
                                        <input type="hidden" name="name" value="{{$user->name}}">
                                        <input type="hidden" name="surname" value="{{$user->surname}}">
                                        <input type="hidden" name="street" value="{{$user->street}},{{$user->number}}, {{$user->complement}} ">
                                        <input type="hidden" name="number" value="{{$user->number}}">
                                        <input type="hidden" name="district" value="{{$user->district}}">
                                        <input type="hidden" name="zip_code" value="{{$user->zip_code}}">
                                        <input type="hidden" name="city" value="{{$user->city_id}}">
                                        <input type="hidden" name="state" value="{{$user->state_id}}">
                                        <input type="hidden" name="country" value="{{$user->country_id}}">
                                        <input type="hidden" name="phone" value="{{$user->phone}}">
                                        <input type="hidden" name="email" value="{{$user->email}}">

                                        <input type="hidden" name="board" value="ROOM_ONLY">
                                        {{--//TODO: VERIFICAR ESTA INFO COM A AVANTIO--}}

                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="paymenttype" value="BOLETO">

                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="card_name" placeholder="Nome no cartão">
                                        </div>
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="card_number" placeholder="Número do cartão">
                                        </div>
                                        <div class="form-group form-inline">
                                            <input class="d-flex date" type="text" name="card_due_date" placeholder="Validade">
                                            <input class="d-flex" type="text" name="card_cvv" placeholder="CVV">
                                        </div>
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="document" placeholder="Documento">
                                        </div>
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="email" placeholder="E-mail" value="{{$user->email}}">
                                        </div>
                                        <button type="submit" class="btn d-flex switch">Pagar com cartão</button>
                                    </form>
                                </li>
                                <li>
                                    <a href="#!" data-bs-toggle="collapse" data-bs-target=".campos-boleto" class="row texto-marrom align-items-center">
                                        <div class="col grow-0 pe-0">
                                            <picture><i class="fas fa-barcode" aria-hidden="true" style="padding:11px;"></i></picture>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Boleto</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="campos-boleto collapse">
                                    <form method="post" action="{{ route('generate.billet') }}" class="pt-10 mb-30" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="description" value="{{$noites}} noites em {{$accommodation->AccommodationName}} para {{$hospedes}} pessoas.">
                                        <input type="hidden" name="amount" value="{{$amount}}">
                                        {{--Accommoda info--}}
                                        <input type="hidden" name="accommodation_code" value="{{$accommodation->AccommodationId}}">
                                        <input type="hidden" name="user_code" value="{{$accommodation->UserId}}">
                                        <input type="hidden" name="login_ga" value="{{$accommodation->Company}}">
                                        {{--Reservati nfo--}}
                                        <input type="hidden" name="adultsnumber" value="{{Request::segment(5)}}">
                                        <input type="hidden" name="childrennumber" value="{{Request::segment(6)}}">
                                        <input type="hidden" name="checkin_date" value="{{Request::segment(3)}}">
                                        <input type="hidden" name="checkout_date" value="{{Request::segment(4)}}">
                                        {{--User info--}}
                                        <input type="hidden" name="name" value="{{$user->name}}">
                                        <input type="hidden" name="surname" value="{{$user->surname}}">
                                        <input type="hidden" name="street" value="{{$user->street}},{{$user->number}},{{$user->complement}} ">
                                        <input type="hidden" name="district" value="{{$user->district}}">
                                        <input type="hidden" name="zip_code" value="{{$user->zip_code}}">
                                        <input type="hidden" name="city" value="{{$user->city_id}}">
                                        <input type="hidden" name="country" value="{{$user->country_id}}">
                                        <input type="hidden" name="phone" value="{{$user->phone}}">
                                        <input type="hidden" name="email" value="{{$user->email}}">

                                        <input type="hidden" name="board" value="ROOM_ONLY">
                                        {{--//TODO: VERIFICAR ESTA INFO COM A AVANTIO--}}

                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="paymenttype" value="BOLETO">

                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="document" placeholder="CPF">
                                        </div>
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="email" placeholder="E-mail de cobrança" value="{{$user->email}}">
                                        </div>
                                        <button type="submit" class="btn d-flex switch">Pagar com boleto</button>
                                    </form>
                                </li>

                                <li>
                                    <a href="#!" data-bs-toggle="collapse"  data-bs-target=".campos-pix" class="row texto-marrom align-items-center">
                                        <div class="col grow-0 pe-0">
                                            <picture><i class="fa fa-qrcode" aria-hidden="true" style="padding:12px;"></i></picture>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0">Pix</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="campos-pix collapse">
                                    <form method="post" action="{{ route('generate.pix') }}" class="pt-10 mb-30" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="description" value="{{$noites}} noites em {{$accommodation->AccommodationName}} para {{$hospedes}} pessoas.">
                                        <input type="hidden" name="amount" value="{{$amount}}">
                                        <input type="hidden" name="name" value="{{$user->name}} {{$user->surname}}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="accommodation_id" value="{{$accommodation->AccommodationId}}">
                                        <input type="hidden" name="checkin_date" value="{{Request::segment(3)}}">
                                        <input type="hidden" name="checkout_date" value="{{Request::segment(4)}}">

                                        <input type="hidden" name="paymenttype" value="PIX">
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="document" placeholder="CPF">
                                        </div>
                                        <div class="form-group">
                                            <input class="d-flex" type="text" name="email" placeholder="E-mail de cobrança" value="{{$user->email}}">
                                        </div>
                                        <button type="submit" class="btn d-flex switch">Pagar com pix</button>
                                    </form>
                                </li>
                            </ul>

                    </div>
                </div><br>
                <hr class="mb-30">

                <div class="row texto-m mb-15">
                    <div class="col">
                        <p>Autorizo Plataforma Hostings a enviar instruções à instituição financeira que emitiu meu cartão para receber pagamentos da conta do meu cartão, em conformidade com os termos do meu contrato com vocês e aceito as <a href="#!">condições gerais de contratação</a> e a <a href="">política de proteção de dados</a></p>
                    </div>
                </div>
                <div class="row mb-15 justify-content-center">
                    <div class="col col-sm-5">

                    </div>
                </div>
                @endif



            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 00000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });
</script>

@endsection


