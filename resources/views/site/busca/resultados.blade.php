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
    <title>Yogha - Sinta-se em casa</title>

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

    <!-- STYLE -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">

    <!-- RESPONSIVE -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DATE RANGE -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- GOOGLE MAPS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSeQcKPvoa7ix-NIn8yf_gRlBqv4QtaYI&v=weekly&channel=2" ></script>

    <style>
        #map {
            height: 100%;
            width: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<!-- ABA BUSCA -->
@include('site.abas.busca', compact('recently_viewed','surpriseme'))


<body id="resultado-busca">

<!-- CONTEUDO -->

<!-- mapa flutuante -->
<section class="show-b hidden">
    <div class="container mb-15">
        <div class="row">
            <div class="col justify-content-center">
                <a href="#!" class="btn mx-auto switch"><i class="uil uil-map"></i> Mapa</a>
            </div>
        </div>
    </div>
</section>
<section class="fixo-t">
    <div class="container pt-15 mb-15">
        <div class="row busca-resumo collapse show">
            <div class="col btn-flutuante">
                <a href="javascript:history.back();" class="btn btn-2 btn-p btn-ico"><i class="icone-m uil uil-angle-left"></i></a>
                <a href="#!" class="btn btn-3 btn-p d-flex texto-ret" data-bs-toggle="collapse" data-bs-target=".busca-resumo, .busca-detalhes"><span>{{$district}}</span><span class="text-right texto-p">{{date_format(date_create($startdate),"d/m/y")}} → {{date_format(date_create($enddate),"d/m/y")}} - {{Request::segment(5)+Request::segment(6)}} hospedes</span></a>
                <a href="#!" class="btn btn-2 btn-p btn-ico" data-bs-toggle="collapse" data-bs-target=".busca-filtro"><i class="uil uil-sliders-v-alt"></i></a>
            </div>
        </div>
        <div class="row busca-detalhes collapse">
            <div class="col">
                <div class="row mb-10">
                    <div class="col btn-flutuante">
                        <a href="#!" class="btn btn-2 btn-p btn-ico" data-bs-toggle="collapse" data-bs-target=".busca-resumo, .busca-detalhes"class="btn btn-2 btn-p btn-ico"><i class="icone-m uil uil-times"></i></a>
                        <a href="#!" class="btn btn-2 btn-p btn-ico" data-bs-toggle="collapse" data-bs-target=".busca-filtro"><i class="uil uil-sliders-v-alt"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#!"  data-bs-toggle="collapse" data-bs-target="#aba-busca" class="btn btn-4 texto-m d-flex mb-0 justify-content-start switch"><i class="icone-m uil uil-search"></i> <span>{{$district}}</span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col pe-0">
                        <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                        <!--<a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-datas" class="btn btn-4 texto-m d-flex mb-0 justify-content-start switch"><i class="icone-m uil uil-calender"></i> <span>08/10 → 12/10</span></a>-->
                    </div>
                    <div class="col ps-0">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-hospedes" class="btn btn-4 texto-m d-flex mb-0 justify-content-start switch"><i class="icone-m uil uil-users-alt"></i> <span>2 hóspedes</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="map"></div>

<!-- ABA RESULTADO -->
<section id="aba-resultado" class="aba">
    <div class="container fundo-branco pt-15 h-100">

        @foreach($results as $result)
            <div id="{{$result->AccommodationId}}" class="row gap-10 anuncio-flutuante texto-marrom-escuro" style="display:none;">
                <div class="col grow-0 pe-0">
                    <?php $pictures = json_decode($result->Pictures, true); ?>
                    @if(isset($pictures))

                        @if(isset($pictures['Picture'][0]['OriginalURI']) && $pictures['Picture'][0]['OriginalURI'] != '')
                            <a href="{{URL::to('/');}}/accommodation/{{$result->AccommodationId}}{{(Request::segment(3) != '' ? '/'.Request::segment(3)  : '')}}{{(Request::segment(4) != '' ? '/'.Request::segment(4) : '')}}a">
                                <picture class="pic-m" style="background-image: url({{$pictures['Picture'][0]['OriginalURI']}});"></picture>
                            </a>
                        @endif

                    @endif

                </div>
                <div class="col ps-0">
                    <a href="{{URL::to('/');}}/accommodation/{{$result->AccommodationId}}{{(Request::segment(3) != '' ? '/'.Request::segment(3)  : '')}}{{(Request::segment(4) != '' ? '/'.Request::segment(4) : '')}}">
                        <h2 class="mb-5 texto-ret"><strong>{{$result->AccommodationName}}</strong></h2>
                        @if(isset($occuppationalrules) && !empty($occuppationalrules))
                            <p class="texto-m texto-ret mb-5"><span>Estadia mínima de {{$occuppationalrules[0]->MinimumNights}} noite{{($occuppationalrules[0]->MinimumNights > 1 ? 's' : '')}}</span></p>
                        @endif
                        <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R${{$result->Price}}</strong> /noite <span class="texto-marrom texto-p">preço estimado</span></h4>
                    </a>
                </div>
            </div>
        @endforeach


        <div class="row mb-15">
            <div class="col">
                <a href="#!" class="arrastar toggle-resultado texto-marrom-escuro text-center">
                    <p class="mb-0">Acomodações em <strong>{{ucfirst(trans($district))}}</strong></p>
                    <h2><strong>Resultado da busca</strong></h2>
                </a>
            </div>
        </div>

        @foreach($results as $result)
            <div class="row mb-30">
                <div class="col">
                    <a href="{{URL::to('/')}}/accommodation/{{$result->AccommodationId}}{{(Request::segment(3) != '' ? '/'.Request::segment(3)  : '')}}{{(Request::segment(4) != '' ? '/'.Request::segment(4) : '')}}">

                        <?php $pictures = json_decode($result->Pictures, true); ?>
                        @if(isset($pictures))
                            <div class="slick slide-full mb-15">
                                @foreach ($pictures['Picture'] as $picture)
                                    @if(isset($picture['OriginalURI']) && $picture['OriginalURI'] != '')
                                        <picture class="pic-full" style="background-image: url({{$picture['OriginalURI']}});"></picture>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    </a>
                    {{--                <div class="row mb-5">--}}
                    {{--                    <div class="col">--}}
                    {{--                        <p class="avaliacao texto-marrom mb-0">--}}
                    {{--                            <i class="icone-m uil uil-star"></i>--}}
                    {{--                            <i class="icone-m uil uil-star"></i>--}}
                    {{--                            <i class="icone-m uil uil-star"></i>--}}
                    {{--                            <i class="icone-m uil uil-star"></i>--}}
                    {{--                            <i class="icone-m uil uil-star"></i>--}}
                    {{--                        </p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col grow-0"><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-favoritos"><i class="icone-m uil uil-heart"></i></a></div>--}}
                    {{--                </div>--}}
                    <a href="{{URL::to('/');}}/accommodation/{{$result->AccommodationId}}{{(Request::segment(3) != '' ? '/'.Request::segment(3)  : '')}}{{(Request::segment(4) != '' ? '/'.Request::segment(4) : '')}}" class="texto-marrom-escuro">
                        <h2 class="mb-5"><strong>{{$result->AccommodationName}}</strong>

                            @if(isset($occuppationalrules) && !empty($occuppationalrules))
                                <p class="texto-m texto-ret mb-5"><span>Estadia mínima de {{$occuppationalrules[0]->MinimumNights}} noite{{($occuppationalrules[0]->MinimumNights > 1 ? 's' : '')}}.</span></p>
                            @endif
                            <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R${{$result->Price}}</strong> /noite • <span class="texto-marrom">preço estimado</span></h4>
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</section>

<!-- OVERLAY MAPA -->
<a href="#!" class="fundo-escuro-mapa toggle-resultado"></a>

<!-- OVERLAY -->
<a href="#!" class="fundo-escuro"></a>

<!-- SCRIPTS -->

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            startDate: '{{date('%d/%m/%Y', strtotime($startdate))}}',
            endDate: '{{date('%d/%m/%Y', strtotime($enddate))}}',
            locale: {
                format: 'DD/M/Y'
            }
        }, function(start, end, label) {
            window.location.href = '{{URL::to('/');}}/searchbydistrict/{{$district}}/'+start.format('YYYY-MM-DD')+'/'+end.format('YYYY-MM-DD');
        });
    });


    function initializeMap() {

        var locations = [
                @foreach($results as $result)
                <?php
                $localization = json_decode($result->LocalizationData, true);
                $latitude = $localization['GoogleMaps']['Latitude'];
                $longitude = $localization['GoogleMaps']['Longitude'];
                $zoom = $localization['GoogleMaps']['Zoom'];
                $link = '/accommodation/'.$result->AccommodationId;
                ?>
            ['{{$result->AccommodationName}}',{{$latitude}}, {{$longitude}}, '{{$link}}', {{$result->AccommodationId}}],
            @endforeach
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng({{$latitude}},{{$longitude}}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        var icon = {
            scaledSize: new google.maps.Size(70, 70)
        };

        var marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            icon : icon
        });

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon : icon
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    $('.anuncio-flutuante').hide();
                    $('#'+locations[i][4]).fadeIn();

                    //alert(locations[i][3]);
                }
            })(marker, i));
        }

        // var styles = [
        //     {"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}
        // ];
        //
        // map.setOptions({styles: styles});

    }
    initializeMap();

</script>
</body>


</html>
