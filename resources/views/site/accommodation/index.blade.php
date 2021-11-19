<?php
    //Distribution
    /*

    $capacidadetotal = $features['Distribution']['PeopleCapacity'];
    $capacidadeadultos = $features['Distribution']['AdultsCapacity'];
    $ocupacaominima = $features['Distribution']['MinimumOccupation'];
    $criancas = $features['Distribution']['AcceptYoungsters'];
    $quartos =  $features['Distribution']['Bedrooms'];
    $camascasal =  $features['Distribution']['DoubleBeds'];
    $camassolteiro =  $features['Distribution']['IndividualBeds'];
    $sofacama =  $features['Distribution']['IndividualSofaBed'];
    $sofacamacasal =  $features['Distribution']['DoubleSofaBed'];
    $camasqueen = $features['Distribution']['QueenBeds'];
    $camasking = $features['Distribution']['KingBeds'];
    $banheiros = $features['Distribution']['Toilets'];
    $banheiras = $features['Distribution']['BathroomWithBathtub'];
    $chuveiros = $features['Distribution']['BathroomWithShower'];

    //Housecarachteristics
    $tv = $features['HouseCharacteristics']['TV'];
    $tvnum = $features['HouseCharacteristics']['NumOfTelevisions'];
    $tvacabo = $features['HouseCharacteristics']['TVSatellite']['Value'];
    $jardim = $features['HouseCharacteristics']['Garden'];
    $moveisjardim = $features['HouseCharacteristics']['GardenFurniture'];
    $ferrodepassar = $features['HouseCharacteristics']['Iron'];
    $lareira = $features['HouseCharacteristics']['FirePlace'];
    $churrasqueira = $features['HouseCharacteristics']['Barbecue'];
    $radio = $features['HouseCharacteristics']['Radio'];
    $minibar = $features['HouseCharacteristics']['MiniBar'];
    $terraco = $features['HouseCharacteristics']['Terrace'];
    $cercado = $features['HouseCharacteristics']['FencedPlot'];
    $elevador = $features['HouseCharacteristics']['Elevator'];
    $dvd = $features['HouseCharacteristics']['DVD'];
    $sacada = $features['HouseCharacteristics']['Balcony'];
    $espremedordesuco = $features['HouseCharacteristics']['JuiceSqueazer'];
    $chaleiraeletrica = $features['HouseCharacteristics']['ElectricKettle'];
    $secadordecabelo = $features['HouseCharacteristics']['HairDryer'];
    $espacokids = $features['HouseCharacteristics']['ChildrenArea'];
    $academia = $features['HouseCharacteristics']['Gym'];
    $alarme = $features['HouseCharacteristics']['Alarm'];
    $quadradetenis = $features['HouseCharacteristics']['Tennis'];
    $quadradesquash = $features['HouseCharacteristics']['Squash'];
    $remo = $features['HouseCharacteristics']['Paddel'];
    $sauna = $features['HouseCharacteristics']['Sauna'];
    $numerodeventiladores = $features['HouseCharacteristics']['NumOfFans'];
    $numeroderepelentes = $features['HouseCharacteristics']['NumOfElectronicMosquitoRepeller'];
    $telaantimosquito = $features['HouseCharacteristics']['WindowScreens'];
    $adaptadoparadeficientes = $features['HouseCharacteristics']['HandicappedFacilities'];
    $jacuzzi = $features['HouseCharacteristics']['Jacuzzi'];
    $permitidofumar = $features['HouseCharacteristics']['SmokingAllowed'];

    //Kitchen
    $classedecozinha = $features['HouseCharacteristics']['KitchenClass'];
    $tipodecozinha = $features['HouseCharacteristics']['KitchenType'];
    $numerodecozinhas = $features['HouseCharacteristics']['NumberOfKitchens'];
    $geladeira = $features['HouseCharacteristics']['Fridge'];
    $freezer = $features['HouseCharacteristics']['Freezer'];
    $lavaroupas = $features['HouseCharacteristics']['WashingMachine'];
    $lavaloucas = $features['HouseCharacteristics']['Dishwasher'];
    $secadora = $features['HouseCharacteristics']['Dryer'];
    $cafeteira = $features['HouseCharacteristics']['CoffeeMachine'];
    $fritadeira = $features['HouseCharacteristics']['Fryer'];
    $talheres = $features['HouseCharacteristics']['TableWare'];
    $utensiliosdecozinha = $features['HouseCharacteristics']['KitchenUtensils'];
    $microondas = $features['HouseCharacteristics']['Microwave'];
    $forno = $features['HouseCharacteristics']['Oven'];
    */


?>

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
    <title>{{$accommodation[0]->AccommodationName}} - Yogha - Sinta-se em casa</title>

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

</head>

<body id="single-anuncio">

<!-- CONTEUDO -->

<header class="mb-30">
    <div class="container">
        <div class="row pt-15">
            <div class="col">
                <a href="javascript:history.back();" class="btn btn-2 btn-ico me-auto"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col">
                <div class="form-group form-inline justify-content-end gap-10">
                    <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-upload"></i></a>
                    <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                </div>
            </div>
        </div>
        @if(isset($pictures))
            <div class="row mb-15">
                <div class="col px-0">
                <div class="slick">
                    @foreach ($pictures['Picture'] as $picture)
                        @if(isset($picture['OriginalURI']) && $picture['OriginalURI'] != '')
                            <picture style="background-image: url({{$picture['OriginalURI']}});"></picture>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                @if(empty($description[1]['Region']['AccommodationName']) === false)
                    <h2 class="texto-g mb-5">{{$accommodation[0]->AccommodationName}}</h2>
                @endif
                @if(empty($description[1]['Region']['Name']) === false)
                    <h3 class="texto-m mb-5">{{$description[1]['Region']['Name']}}</h3>
                @endif
                <p class="texto-m">
                    @if(empty($accommodation[0]->Capacity) === false)
                        {{$accommodation[0]->Capacity}} hóspedes •
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
                <h4 class="texto-m d-flex gap-5"><i class="icone-m texto-laranja uil uil-star"></i> <strong>9,5</strong> (200)</h4>
            </div>
        </div>
    </div>
</header>

<hr class="mb-30">

<section class="mb-15">
    <div class="container">
        <div class="row mb-30">
            <div class="col">
                @if(empty($description[1]['Description']) === false)
                    <p><?php echo $description[1]['Description']; ?></p>
                @endif
                {{--TODO: truncate dos textos de descrição --}}
                <!--<div>
                    <div class="conteudo-extra collapse">
                        <p>Conteúdo extra</p>
                    </div>
                </div>
                <a href="#!" data-bs-toggle="collapse" data-bs-target=".conteudo-extra" aria-expanded="false" class="btn-link texto-m px-0 d-flex">
                    <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar mais</strong> <i class="icone-m uil uil-angle-down"></i></p>
                    <p class="align-items-center mb-0 mostrar-menos"><strong> Mostrar menos</strong> <i class="icone-m uil uil-angle-up"></i></p>
                </a>-->
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <h3><strong>O que este espaço oferece</strong></h3>
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <ul class="gap-10">
                    @if(empty($features['HouseCharacteristics']['wifi']) === false)
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-wifi"></i> Wifi
                    </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['TV']) === false)
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-desktop"></i> Televisão
                    </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['TVSatellite']) === false)
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg fas fa-satellite-dish"></i> Televisão a Cabo
                    </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['DVD']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-compact-disc"></i> DVD
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Garden']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-flower"></i> Jardim
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['GardenFurniture']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-chair"></i> Móveis de jardim
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Iron']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-tshirt"></i> Ferro de passar roupa
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['FirePlace']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-fire-alt"></i> Lareira
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Barbecue']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Churrasqueira
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Radio']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil fas fa-volume-up"></i> Radio
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['MiniBar']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-cocktail"></i> Mini Bar
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Terrace']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg far fa-building"></i> Terraço
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Elevator']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Elevador
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Balcony']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Sacada
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['JuiceSqueazer']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg far far-lemon"></i> Espremedor de suco
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['ElectricKettle']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-blender"></i> Chaleira elétrica
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['HairDryer']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Secador de cabelo
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['ChildrenArea']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-child"></i> Espaço kids
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Gym']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fa-dumbbell"></i> Academia
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Alarm']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-bell-school"></i> Alarme
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Tennis']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-tennis-ball"></i> Quadra de tênis
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Squash']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-tennis-ball"></i> Quadra de squash
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Sauna']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Sauna
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['NumOfFans']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-fan"></i> Ventilador
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['NumOfElectronicMosquitoRepeller']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Repelente de insetos
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['WindowScreens']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Tela nas janelas
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['HandicappedFacilities']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-accessible-icon-alt"></i> Acessibilidade
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Jacuzzi']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-hot-tub"></i> Jacuzzi
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Fridge']) === false)
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-garden"></i> Geladeira
                    </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Freezer']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-snowflake"></i> Freezer
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['WashingMachine']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Máquina de lavar roupas
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Dryer']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Secadora
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Dishwasher']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Lava louças
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['CoffeeMachine']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-coffee"></i> Cafeteira
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Fryer']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Fritadeira
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['TableWare']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-utensils"></i> Talheres
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['KitchenUtensils']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg fas fa-utensil-spoon"></i> Utensílios de coziha
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Microwave']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Microondas
                        </li>
                    @endif

                    @if(empty($features['HouseCharacteristics']['Kitchen']['Oven']) === false)
                        <li class="d-flex align-items-center gap-10">
                            <i class="icone-gg uil uil-garden"></i> Forno
                        </li>
                    @endif


{{--TODO: Deixar essa lista colapsável--}}
                    <!--
                        <ul class="lista-extra collapse gap-10">
                            <li class="d-flex align-items-center gap-10">
                                <i class="icone-gg uil uil-basketball"></i> Área de esportes
                            </li>
                            <li class="d-flex align-items-center gap-10">
                                <i class="icone-gg uil uil-raindrops-alt"></i> Lavanderia
                            </li>
                            <li class="d-flex align-items-center gap-10">
                                <i class="icone-gg uil uil-swimmer"></i> Piscina
                            </li>
                        </ul>
                    -->
                </ul>
                <!--<a href="#!" data-bs-toggle="collapse" data-bs-target=".lista-extra" aria-expanded="false" class="btn-link texto-m px-0 d-flex">
                    <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar todas as 27 comodidades</strong> <i class="icone-m uil uil-angle-down"></i></p>
                    <p class="align-items-center mb-0 mostrar-menos"><strong> Esconder</strong> <i class="icone-m uil uil-angle-up"></i></p>
                </a>-->
            </div>
        </div>
    </div>
</section>

<hr class="mb-30">

<section class="mb-15">
    <div class="container">
        <div class="row mb-15">
            <div class="col">
                <h3><strong>Serviços extras</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slider slide-4col texto-m texto-branco">
                    <ul>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" >
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3>Limpeza</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" >
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3>Lavanderia</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" >
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3>Aluguel de carro</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" >
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3>Guia turístico</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<hr class="mb-30">

<section class="mb-15">
    <div class="container">
        <div class="row mb-15">
            <div class="col">
                <h3><strong>Localização</strong></h3>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col">
                <iframe
                    class="mapa"
                    width="600"
                    height="450"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBmkujyYai1vhF5NXfXDyIDbeWyaVEU3xk&q='{{$description[1]['Region']['Name']}}'&zoom={{$zoom}}&center={{$latitude}},{{$longitude}}"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>

{{--                <div id="map"></div>--}}
{{--                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmkujyYai1vhF5NXfXDyIDbeWyaVEU3xk&callback=initMap&v=weekly&channel=2" async ></script>--}}
{{--                <script>--}}
{{--                    function initMap() {--}}
{{--                        const myLatLng = { lat: {{$latitude}}, lng: {{$longiture}} };--}}
{{--                        const map = new google.maps.Map(document.getElementById("map"), {--}}
{{--                            zoom: {{$zoom}},--}}
{{--                            center: myLatLng,--}}
{{--                        });--}}
{{--                        new google.maps.Marker({--}}
{{--                            position: myLatLng,--}}
{{--                            map,--}}
{{--                            title: "{{$accommodation[0]->AccommodationName}}",--}}
{{--                        });--}}
{{--                    }--}}
{{--                </script>--}}

            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <h3><strong>Encontre nas proximidades</strong></h3>
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <ul class="gap-10">
                    <li class="row">
                        <div class="col grow-0 pe-0">
                            <i class="icone-m uil uil-map-marker"></i>
                        </div>
                        <div class="col">
                            <p class="texto-m mb-0"><strong>Restaurante Barolo</strong> → 110m</p>
                            <p class="texto-m mb-0">Restaurante</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col grow-0 pe-0">
                            <i class="icone-m uil uil-map-marker"></i>
                        </div>
                        <div class="col">
                            <p class="texto-m mb-0"><strong>We are Bastards</strong> → 320m</p>
                            <p class="texto-m mb-0">Restaurante</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col grow-0 pe-0">
                            <i class="icone-m uil uil-map-marker"></i>
                        </div>
                        <div class="col">
                            <p class="texto-m mb-0"><strong>Hipermercado Condor</strong> → 1,5km</p>
                            <p class="texto-m mb-0">Supermercado</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

<hr class="mb-30">

{{--<section class="mb-15">--}}
{{--    <div class="container">--}}
{{--        <div class="row mb-15">--}}
{{--            <div class="col">--}}
{{--                <h4 class="texto-m d-flex gap-5"><i class="icone-m uil uil-star"></i> <strong>9,5</strong> • 2 avaliações</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="slider slide-2col depoimentos">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <h3 class="mb-5"><strong>Wagner</strong></h3>--}}
{{--                            <p class="texto-m mb-10">2 horas atrás</p>--}}
{{--                            <p class="mb-0 texto-m">local ótimo e o atendimento impecável, retornarei em breve.</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <h3 class="mb-5"><strong>Larissa</strong></h3>--}}
{{--                            <p class="texto-m mb-10">Set 2021</p>--}}
{{--                            <p class="mb-0 texto-m">Uma ótima experiência estadia :D</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <h3 class="mb-5"><strong>Wagner</strong></h3>--}}
{{--                            <p class="texto-m mb-10">2 horas atrás</p>--}}
{{--                            <p class="mb-0 texto-m">local ótimo e o atendimento impecável, retornarei em breve.</p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<hr class="mb-30">--}}

<section class="mb-15">
    <div class="container">
        <div class="row mb-15">
            <div class="col">
                <h3><strong>Contatos</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex gap-10">
                <div class="form-group form-inline">
                    <a href="#!" class="btn btn-4 btn-p">E-mail</a>
                    <a href="#!" class="btn btn-4 btn-p">Whatsapp</a>
                    <a href="#!" class="btn btn-4 btn-p">Telefone</a>
                </div>
            </div>
        </div>
    </div>
</section>

<hr class="mb-30">

<section class="mb-30">
    <div class="container texto-m texto-marrom-escuro">
        <div class="row">
            <div class="col">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-1" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Observações</strong></p>
                        <p class="mb-15">Não é permitido fumar</p>
                    </div>
                    <div class="col d-inline-flex align-self-center grow-0 mb-15">
                        <i class="icone-m uil uil-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="row collapse" id="cont-extra-1">
                <div class="col">
                    <p class="mb-15">Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
                </div>
            </div>
        </div>
        <hr class="mb-15">
        <div class="row">
            <div class="col">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-2" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Consições de reserva</strong></p>
                        <p class="mb-15">Desde a reserva até 6 dias antes da entrada, o cancelamento terá um custo de 10% do valor do aluguel</p>
                    </div>
                    <div class="col d-inline-flex align-self-center grow-0 mb-15">
                        <i class="icone-m uil uil-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="row collapse" id="cont-extra-2">
                <div class="col">
                    <p class="mb-15">Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
                </div>
            </div>
        </div>
        <hr class="mb-15">
        <div class="row">
            <div class="col">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-3" class="row">
                    <div class="col">
                        <p class="mb-5"><strong>Notas adicionais</strong></p>
                        <p class="mb-15">Horário de entrada: todos os dias de 15:00 a 20:00</p>
                    </div>
                    <div class="col d-inline-flex align-self-center grow-0 mb-15">
                        <i class="icone-m uil uil-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="row collapse" id="cont-extra-3">
                <div class="col">
                    <p class="mb-15">Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
                </div>
            </div>
        </div>
        <hr class="mb-15">
        <div class="row">
            <div class="col">
                <a href="#!" class="btn-link texto-m"><i class="icone-m uil uil-shield-exclamation"></i> <strong>Denunciar este anúncio</strong></a>
            </div>
        </div>
    </div>
</section>

<section class="fixo-b">
    <div class="container pt-15 mb-15">
        <div class="row">
            <div class="col grow-0">
                <h4 class="texto-m d-flex gap-5 mb-5"><strong class="texto-laranja">R${{$price}}</strong> /noite</h4>
                <!--<h4 class="texto-m d-flex gap-5"><i class="icone-m texto-laranja uil uil-star"></i> <strong>9,5</strong> (200)</h4>-->
            </div>
            <div class="col">
                <a href="pagina-checkout.shtml" class="btn">Verificar disponibilidade</a>
            </div>
        </div>
    </div>
</section>

<!-- OVERLAY -->
<a href="#!" class="fundo-escuro"></a>

<!-- SCRIPTS -->

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>




</body>

</html>
