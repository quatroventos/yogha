<!doctype html>
<html lang="pt-BR">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="">
    <meta name="Keywords" content="">

    <!-- CANONICAL -->
    <link rel="canonical" href="http://www.yogha.com.br/">

    <!--TITLE -->
    <title>{{$accommodation->AccommodationName}} - Yogha - Sinta-se em casa</title>

    <!-- BOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- ICONES -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- STYLE -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">

    <!-- RESPONSIVE -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- GOOGLE MAPS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSeQcKPvoa7ix-NIn8yf_gRlBqv4QtaYI&callback=initMap&v=weekly&channel=2" async ></script>


</head>

<body id="single-anuncio">
<!-- ABA LOJA -->
@include('site.abas.service_list')
<!-- ABA LOJA SINGLE -->
@include('site.abas.service_details')

<!-- CONTEUDO -->



@env('local')
    <div class="alerta ativo" style="color: white; background: red; top:0; height: 10px; width: 30%; margin:10px auto; opacity:.5;"> <i class="fa-solid fa-vial"></i> Ambiente de testes </div>
@endenv

<header class="mb-30">
    <div class="container">
        <div class="row pt-15">
            <div class="col">
                <a href="javascript:history.back();" class="btn btn-2 btn-ico me-auto"><i class="d-inline-flex uil uil-angle-left"></i></a>
            </div>
            <div class="col">
                <div class="form-group form-inline justify-content-end gap-10">
                    {{--Compartilhar--}}
                    <div class="dropdown menu-compartilhar">
                        <button class="btn bntn-2 btn-ico share" type="button">
                            <i class="uil uil-upload"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="whatsapp://send?text=Veja essa acomodação que encontrei no Yogha! {{Request::url()}}" data-action="share/whatsapp/share" class="btn btn-2 btn-ico" target="_blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="btn btn-2 btn-ico" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="http://twitter.com/share?text=Veja essa acomodação que encontrei no Yogha!&url={{Request::url()}}" class="btn btn-2 btn-ico" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <script>
                        $('.share').on('click', function(){
                            $('.dropdown-menu').slideToggle('fast');
                        });
                    </script>

                    @auth
                        @if($isfav == 1)
                            <a href="#!" id="fav"  style="display: none;"  class="btn btn-2 btn-ico"><i class="far fa-heart"></i></a>
                            <a href="#!" id="unfav" class="btn btn-2 btn-ico"><i class="fas fa-heart"></i></a>
                        @else
                            <a href="#!" id="fav" class="btn btn-2 btn-ico"><i class="far fa-heart"></i></a>
                            <a href="#!" id="unfav" style="display: none;" class="btn btn-2 btn-ico"><i class="fas fa-heart"></i></a>
                        @endif
                    @else
                        <a href="{{URL::to('/login')}}" id="fav" class="btn btn-2 btn-ico"><i class="far fa-heart"></i></a>
                    @endauth
                </div>
            </div>
        </div>
        @if(isset($pictures))
            <div class="row mb-15">
                <div class="col px-0">
                <div class="slick slide-full">
                    @foreach ($pictures['Picture'] as $picture)
                        @if(isset($picture['OriginalURI']) && $picture['OriginalURI'] != '')
                            <picture class="pic-full" style="background-image: url({{$picture['OriginalURI']}});"></picture>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">

                    <h2 class="texto-g mb-5">{{$accommodation->AccommodationName ?? ''}}</h2>
                <h3 class="texto-m mb-5"><a href="/searchbydistrict/{{strtolower($description[0]['District']['Name'])}}">{{$description[0]['District']['Name'] ?? ''}}</a> - {{$description[0]['City']['Name'] ?? ''}} - {{$description[0]['Region']['Name'] ?? ''}}</h3>

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
{{--                    @if(empty($features['Distribution']['Toilets']) === false)--}}
{{--                        {{$features['Distribution']['Toilets']}} Banheiros--}}
{{--                    @endif--}}
                </p>
                <!--<h4 class="texto-m d-flex gap-5"><i class="d-inline-flex icone-m texto-laranja uil uil-star"></i> <strong>9,5</strong> (200)</h4>-->
            </div>
        </div>
    </div>
</header>

<hr class="mb-30">

<section class="mb-15">
    <div class="container">

        <div class="row descricao">
            <div class="col-12 col-sm-8">
                <div class="row mb-30">
                    <div class="col">
                        @if(empty($description[8]['Description']) === false)
                            <p><?php echo $description[8]['Description']; ?></p>
                        @endif
                        {{--TODO: truncate dos textos de descrição --}}
                        <!--<div>
                            <div class="conteudo-extra collapse">
                                <p>Conteúdo extra</p>
                            </div>
                        </div>
                        <a href="#!" data-bs-toggle="collapse" data-bs-target=".conteudo-extra" aria-expanded="false" class="btn-link texto-m px-0 d-flex">
                            <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar mais</strong> <i class="d-inline-flex icone-m uil uil-angle-down"></i></p>
                            <p class="align-items-center mb-0 mostrar-menos"><strong> Mostrar menos</strong> <i class="d-inline-flex icone-m uil uil-angle-up"></i></p>
                        </a>-->
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row mb-15">
                    <div class="col">
                        <h3><strong>O que este espaço oferece</strong></h3>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col">
                        <ul class="gap-10 lista-colunas icone-m texto-m">
                            @if(empty($features['HouseCharacteristics']['wifi']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-wifi"></i> Wifi
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['TV']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-desktop"></i> Televisão
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['TVSatellite']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-satellite-dish"></i> Televisão a Cabo
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['DVD']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-compact-disc"></i> DVD
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Garden']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                            <i class="d-inline-flex  uil uil-flower"></i> Jardim
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['GardenFurniture']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                            <i class="d-inline-flex  fas fa-chair"></i> Móveis de jardim
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Iron']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex  fas fa-tshirt"></i> Ferro de passar roupa
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['FirePlace']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex  fas fa-fire-alt"></i> Lareira
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Barbecue']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex  uil uil-garden"></i> Churrasqueira
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Radio']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex  uil fas fa-volume-up"></i> Radio
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['MiniBar']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-cocktail"></i> Mini Bar
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Terrace']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex far fa-building"></i> Terraço
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Elevator']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/elevador.png')}}"> Elevador
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Balcony']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/sacada.png')}}"> Sacada
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['JuiceSqueazer']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/espremedor-de-suco.png')}}"> Espremedor de suco
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['ElectricKettle']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/chaleira.png')}}"> Chaleira elétrica
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['HairDryer']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/secadorcabelo.png')}}">  Secador de cabelo
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['ChildrenArea']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-child"></i> Espaço kids
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Gym']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fa-dumbbell"></i> Academia
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Alarm']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-bell-school"></i> Alarme
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Tennis']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/quadratenis.png')}}"> Quadra de tênis
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Squash']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/quadrasquash.png')}}"> Quadra de squash
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Sauna']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/sauna.png')}}"> Sauna
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['NumOfFans']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-fan"></i> Ventilador
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['NumOfElectronicMosquitoRepeller']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/repelentedeinsetos.png')}}"> Repelente de insetos
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['WindowScreens']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/telajanelas.png')}}"> Tela nas janelas
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['HandicappedFacilities']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-accessible-icon-alt"></i> Acessibilidade
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Jacuzzi']) === false)
                            <li class="d-inline-flex  align-items-center gap-10">
                                <i class="d-inline-flex fas fa-hot-tub"></i> Jacuzzi
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Fridge']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/geladeira.png')}}"> Geladeira
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Freezer']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex uil uil-snowflake"></i> Freezer
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['WashingMachine']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/lavaroupas.png')}}"> Máquina de lavar roupas
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Dryer']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/secadora.png')}}"> Secadora
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Dishwasher']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/lavaloucas.png')}}"> Lava louças
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['CoffeeMachine']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-coffee"></i> Cafeteira
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Fryer']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/fritadeira.png')}}"> Fritadeira
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['TableWare']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-utensils"></i> Talheres
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['KitchenUtensils']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <i class="d-inline-flex fas fa-utensil-spoon"></i> Utensílios de coziha
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Microwave']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/microondas.png')}}"> Microondas
                            </li>
                            @endif

                            @if(empty($features['HouseCharacteristics']['Kitchen']['Oven']) === false)
                            <li class="d-inline-flex align-items-center gap-10">
                                <img class="feature-icon" src="{{asset('img/icones/forno.png')}}"> Forno
                            </li>
                            @endif
                        {{--TODO: Deixar essa lista colapsável--}}
                        <!--
                            <ul class="lista-extra collapse gap-10">
                                <li class="d-inline-flex align-items-center gap-10">
                                    <i class="d-inline-flex uil uil-basketball"></i> Área de esportes
                                </li>
                                <li class="d-inline-flex align-items-center gap-10">
                                    <i class="d-inline-flex uil uil-raindrops-alt"></i> Lavanderia
                                </li>
                                <li class="d-inline-flex align-items-center gap-10">
                                    <i class="d-inline-flex uil uil-swimmer"></i> Piscina
                                </li>
                            </ul>
                        -->
                        </ul>
                        <!--<a href="#!" data-bs-toggle="collapse" data-bs-target=".lista-extra" aria-expanded="false" class="btn-link texto-m px-0 ">
                            <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar todas as 27 comodidades</strong> <i class="d-inline-flex icone-m uil uil-angle-down"></i></p>
                            <p class="align-items-center mb-0 mostrar-menos"><strong> Esconder</strong> <i class="d-inline-flex icone-m uil uil-angle-up"></i></p>
                        </a>-->
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row mb-15">
                    <div class="col">
                        <h3><strong>Serviços extras</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="slider slide-4col texto-m texto-branco">
                            <ul>
                                @foreach($services as $service)
                                <li>
                                    <a href="{{URL::to('/service_details')}}/{{$service->id}}" class="switch service-link" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" >
                                        <picture style="background-image: url({{URL::to('/')}}/files/services/{{$service->image}});"></picture>
                                        <div>
                                            <h3>{{$service->title}} - R$ {{$service->price}}</h3>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="row mb-15">
                    <div class="col">
                        <h3><strong>Localização</strong></h3>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col">

                        <div id="map"></div>

                        <script>
                            function initMap() {
                                const myLatLng = { lat: {{$latitude}}, lng: {{$longitude}} };
                                const map = new google.maps.Map(document.getElementById("map"), {
                                    zoom: {{$zoom}},
                                    center: myLatLng,
                                });
                                new google.maps.Marker({
                                    position: myLatLng,
                                    map,
                                    title: "{{$accommodation->AccommodationName}}",
                                });
                            }
                        </script>

                    </div>
                </div>
                <hr class="mb-30">
                <div class="row mb-15">
                    <div class="col">
                        <h3><strong>Contatos</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex gap-10">
                        <div class="form-group form-inline">
{{--                            <a href="" class="btn btn-4 btn-p">E-mail</a>--}}
                            <a href="https://wa.me/554197474876" class="btn btn-4 btn-p">Whatsapp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr class="mb-30">

<section class="mb-30">
    <div class="container texto-m texto-marrom-escuro">
        <div class="row">
            <div class="col-12">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-1" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Observações</strong></p>
                        <p class="mb-15">Não é permitido fumar</p>
                        <p class="mb-15">Não são permitidos animais de estimação</p>
                    </div>
                </a>
            </div>
{{--            <div class="col-12 collapse" id="cont-extra-1">--}}
{{--                <p class="mb-15">Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>--}}
{{--            </div>--}}
        </div>
        <hr class="mb-15">
        <div class="row">
            <div class="col-12">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-2" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Condições de reserva</strong></p>
                        <p class="mb-15">Desde a reserva até 6 dias antes da entrada, o cancelamento terá um custo de 10% do valor do aluguel</p>
                    </div>
{{--                    <div class="col d-inline-flex align-self-center grow-0 mb-15">--}}
{{--                        <i class="d-inline-flex icone-m uil uil-angle-right"></i>--}}
{{--                    </div>--}}
                </a>
            </div>
        </div>
        <hr class="mb-15">
        <div class="row">
            <div class="col-12">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-3" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Notas adicionais</strong></p>
                        <p class="mb-15">Horário de entrada: todos os dias de 15:00 a 20:00</p>
                        <p class="mb-15">Horário de saída: 11:00</p>
                        <p class="mb-15">Uns dias antes da chegada deve contactar o escritório de recepção para informar o horário de chegada (nº vôo / barco em caso) e organizar a recolha de chaves.</p>

                    </div>
                    <div class="col d-inline-flex align-self-center grow-0 mb-15">
                        <i class="d-inline-flex icone-m uil uil-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-12 collapse" id="cont-extra-3">
                <p class="mb-15">Uma vez que chegue ao destino, por favor contacte-nos por telefone e dirija-se directamente ao alojamento ou ponto de encontro combinado.</p>
                <p class="mb-15">Lugar de estacionamento não incluído no preço.</p>
                <p class="mb-15">Chegada fora de horário: Chaves na caixa de correio, com código. Paga-se a totalidade da reserva antes.</p>
                <p class="mb-15">Chegada fora do horário: Organizar chegada com a agência no destino. Cobra-se a totalidade da reserva antecipadamente.</p>
                <p class="mb-15">Não são permitidos animais de estimação.</p>
            </div>
        </div>
    </div>
</section>

<section class="fixo-b">
    <div class="container pt-15 mb-15">
        <div class="row justify-content-between">
            <div class="col grow-0">
                <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R${{$rates->Price ?? ''}}</strong> /noite</h4>
                <!--<h4 class="texto-m d-flex gap-5"><i class="d-inline-flex icone-m texto-laranja uil uil-star"></i> <strong>9,5</strong> (200)</h4>-->
            </div>
            <div class="col col-sm-5">
                @if(Request::segment(3) == '')
                <a href="{{URL::to('/check_availability/'.$accommodation->AccommodationId)}}" class="btn">Verificar disponibilidade</a>
                @else
                    <a href="{{URL::to('/checkout/'.$accommodation->AccommodationId.'/'.Request::segment(3).'/'.Request::segment(4).'/'.Request::segment(5).'/'.Request::segment(6))}}" class="btn">Reservar</a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- OVERLAY -->
<a href="#!" class="fundo-escuro switch"></a>

<!-- SCRIPTS -->
<script>
    $('#fav').click(function(){

        $.ajax({
            url: "{{URL::to('/favorite/'.$accommodation->AccommodationId.'/'.auth()->id())}}",
            context: document.body
        }).done(function() {
            $('#fav').hide();
            $('#unfav').show();
        });
    })
    $('#unfav').click(function(){
        $.ajax({
            url: "{{URL::to('/unfavorite/'.$accommodation->AccommodationId.'/'.auth()->id())}}",
            context: document.body
        }).done(function() {
            $('#fav').show();
            $('#unfav').hide();
        });
    })
</script>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

<script>
    $(document).ready(function(){
        // your on click function here
        $('.service-link').click(function(){
            $('#aba-loja-single').load($(this).attr('href'));
            return false;
        });
    });
</script>

<script>
    $('.share').addEventListener("click", async () => {
        try {
            await navigator.share({ title: "Example Page", url: "" });
            console.log("Data was shared successfully");
        } catch (err) {
            console.error("Share failed:", err.message);
        }
    });
</script>


</body>

</html>
