@extends('site.layouts.site')
@section('content')


<!-- CONTEUDO -->

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

<section>
    <div class="container">
        <div class="row descricao">
            <div class="col-12 col-sm-4">
                <div class="row mb-30">
                    <div class="col grow-0 pe-0">
                        <?php //dd($pictures);?>
                        @if(isset($pictures))
                            <picture class="pic-m" style="background-image: url({{$pictures['Picture'][0]['OriginalURI']}});"></picture>
                        @endif
                    </div>
                    <div class="col">
                        <p></p>
                        <p class="texto-m"><strong>{{$accommodation->UserKind}} em {{$description[1]['Region']['Name']}} com {{$features['Distribution']['Bedrooms']}} quarto(s)</strong></p>
                        <h2 class="mb-5"><strong>{{$accommodation->AccommodationName}}</strong></h2>
                        <p class="texto-m">
                            @if(empty($accommodation->Capacity) === false)
                                {{$accommodation->Capacity}} hóspedes •
                            @endif
                            @if(empty($features['Distribution']['Bedrooms']) === false)
                                {{$features['Distribution']['Bedrooms']}} quartos •
                            @endif
                            @if($totalcamas > 0)
                                {{$totalcamas}} camas •
                            @endif
                            @if(empty($features['Distribution']['Toilets']) === false)
                                {{$features['Distribution']['Toilets']}} Banheiros
                            @endif
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
                        <p class="mb-0">{{date_format(date_create(Request::segment(3)),"d/m/y")}} → {{date_format(date_create(Request::segment(4)),"d/m/y")}}</p>
                    </div>
                    <div class="col grow-0">
                        @auth
                            <a href="{{URL::to('/check_availability/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/'.Request::segment(5).'/'.Request::segment(6))}}" class="btn-link btn-p px-0">Editar</a>
                        @else
                            <a href="{{URL::to('/login')}}" class="btn-link btn-p px-0" >Editar</a>
                        @endauth
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <h4 class="texto-m mb-5"><strong>Hóspedes</strong></h4>
                        <?php $hospedes = Request::segment(5) + Request::segment(6); ?>
                        <p class="mb-0">{{$hospedes}} hóspede{{($hospedes > 1 ? 's' : '')}}</p>
                    </div>
                    <div class="col grow-0">
                        <div class="col grow-0">
                            @auth
                                <a href="{{URL::to('/check_availability/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/'.Request::segment(5).'/'.Request::segment(6))}}" class="btn-link btn-p px-0">Editar</a>
                            @else
                                <a href="{{URL::to('/login')}}" class="btn-link btn-p px-0" >Editar</a>
                            @endauth
                        </div>
                    </div>
                </div>
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
                            <li>R$ {{$accommodation->Price}} x {{$noites}} noites</li>
                                <?php $total = 0 ?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                            <li>{{ $details['title'] }}</li>
                                    @endforeach
                                @endif
                            <li><strong>Total (BLR)</strong></li>
                        </ul>
                    </div>
                    <div class="col grow-0">
                        <ul class="gap-5 text-end texto-m">
                            <li>R$ {{$accommodation->Price * $noites}}</li>

                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <li>R${{ $details['price'] }}</li>
                                @endforeach
                            @endif
                            <li><strong>R${{$accommodation->Price * $noites + $total}}{{-- TODO: calcular taxas com base na api--}}</strong></li>
                            <?php $ammount = $accommodation->Price * $noites + $total; ?>
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
                        <h3 class="mb-15"><strong>Dado pessoais</strong></h3>
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
                    <div class="col">
                        <p>Horário de entrada: todos os dias de 15:00 a 20:00</p>
                        <p>Horário de saída: 11:00</p>
                        <p>Uns dias antes da chegada deve contactar o escritório de recepção para informar o horário de chegada (nº vôo / barco em caso) e organizar a recolha de chaves.</p>
                        <p>Uma vez que chegue ao destino, por favor contacte-nos por telefone e dirija-se directamente ao alojamento ou ponto de encontro combinado.</p>
                        <div class="conteudo-extra collapse">
                            <p>larira</p>
                        </div>
                        <a href="#!" data-bs-toggle="collapse" data-bs-target=".conteudo-extra" aria-expanded="false" class="btn-link texto-m px-0">
                            <div class="align-items-center mostrar-mais"><strong>Mostrar mais</strong> <i class="icone-m uil uil-angle-down"></i></div>
                            <div class="align-items-center mostrar-menos"><strong>Mostrar menos</strong> <i class="icone-m uil uil-angle-up"></i></div>
                        </a>
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
                        <p class="mb-0">Sua reserva ficará confirmada no momento e terá um débito no seu cartão de crédito pelo montante do depósito de confirmação. Para a sua tranquilidade, a operação realiza-se de forma segura através de uma via de pagamento bancária.</p>
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
{{--                            <li>--}}
{{--                                <a href="#!" data-bs-toggle="collapse" data-bs-target=".campos-cartao" class="row texto-marrom align-items-center">--}}
{{--                                    <div class="col grow-0 pe-0">--}}
{{--                                        <picture></picture>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <p class="mb-0">Cartão de crédito</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="campos-cartao collapse">--}}
{{--                                <form method="post" action="{{ route('generate.card') }}" class="pt-10 mb-30" autocomplete="off" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="description" value="{{$noites}} noites em {{$accommodation->AccommodationName}}">--}}
{{--                                    <input type="hidden" name="amount" value="{{$accommodation->Price * $noites}}">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="d-flex" type="text" name="name" placeholder="Nome no cartão">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="d-flex" type="text" name="card_number" placeholder="Número do cartão">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group form-inline">--}}
{{--                                        <input class="d-flex" type="text" name="card_due_date" placeholder="Validade">--}}
{{--                                        <input class="d-flex" type="text" name="cvv" placeholder="CVV">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="d-flex" type="text" name="document" placeholder="CPF">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="d-flex" type="text" name="email" placeholder="E-mail" value="{{$user->email}}">--}}
{{--                                    </div>--}}
{{--                                    <button type="submit" class="btn d-flex switch">Pagar com cartão</button>--}}
{{--                                </form>--}}
{{--                            </li>--}}

                            <li>
                                <a href="#!" data-bs-toggle="collapse"  data-bs-target=".campos-boleto" class="row texto-marrom align-items-center">
                                    <div class="col grow-0 pe-0">
                                        <picture></picture>
                                    </div>
                                    <div class="col">
                                        <p class="mb-0">Boleto</p>
                                    </div>
                                </a>
                            </li>
                            <li class="campos-boleto collapse">
                                <form method="post" action="{{ route('generate.billet') }}" class="pt-10 mb-30" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="description" value="{{$noites}} noites em {{$accommodation->AccommodationName}} para {{$hospedes}} pessoas.">
                                    <input type="text" name="amount" value="{{$ammount}}">
                                    {{--Accommodation info--}}
                                    <input type="text" name="accommodation_code" value="{{$accommodation->AccommodationId}}">
                                    <input type="text" name="user_code" value="{{$accommodation->UserId}}">
                                    <input type="text" name="login_ga" value="{{$accommodation->Company}}">
                                    {{--Reservation info--}}
                                    <input type="text" name="adultsnumber" value="{{Request::segment(5)}}">
                                    <input type="text" name="childrennumber" value="{{Request::segment(6)}}">
                                    <input type="text" name="checkin_date" value="{{Request::segment(3)}}">
                                    <input type="text" name="checkout_date" value="{{Request::segment(4)}}">
                                    {{--User info--}}
                                    <input type="text" name="name" value="{{$user->name}}">
                                    <input type="text" name="surname" value="{{$user->surname}}">
                                    <input type="text" name="document" value="{{$user->cpf}}">
                                    <input type="text" name="street" value="{{$user->street}},{{$user->number}},{{$user->complement}} ">
                                    <input type="text" name="district" value="{{$user->district}}">
                                    <input type="text" name="zip_code" value="{{$user->zip_code}}">
                                    <input type="text" name="city" value="{{$user->city_id}}">
                                    <input type="text" name="country" value="{{$user->country_id}}">
                                    <input type="text" name="phone" value="{{$user->phone}}">
                                    <input type="text" name="email" value="{{$user->email}}">

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
                                        <picture></picture>
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
                                    <input type="hidden" name="amount" value="{{$ammount}}">
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

            </div>
        </div>
    </div>
</section>


@endsection
