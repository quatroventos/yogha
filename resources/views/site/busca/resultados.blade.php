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
                <a href="#!" class="btn btn-3 btn-p d-flex texto-ret" data-bs-toggle="collapse" data-bs-target=".busca-resumo, .busca-detalhes"><span>{{$district}}</span><span class="text-right texto-p">8/10 → 9/10 - 2 hospedes</span></a>
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

<div id="mapa">
    <iframe class="mapa h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14145.8843541857!2d-48.441258572734185!3d-27.578920855907995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95273e5b0a4530f1%3A0x84687ff8c0db3768!2sBarra%20da%20Lagoa%2C%20Florian%C3%B3polis%20-%20SC!5e0!3m2!1spt-BR!2sbr!4v1636255329072!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<!-- ABA RESULTADO -->
<section id="aba-resultado" class="aba">
    <div class="container fundo-branco pt-15 h-100">

        <div class="row gap-10 anuncio-flutuante texto-marrom-escuro">
            <div class="col grow-0 pe-0">
                <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-m" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                </a>
            </div>
            <div class="col ps-0">
                <div class="row mb-5">
                    <div class="col">
                        <p class="avaliacao mb-0 texto-marrom">
                            <i class="icone-m uil uil-star"></i>
                            <i class="icone-m uil uil-star"></i>
                            <i class="icone-m uil uil-star"></i>
                            <i class="icone-m uil uil-star"></i>
                            <i class="icone-m uil uil-star"></i>
                        </p>
                    </div>
                    <div class="col grow-0"><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-favoritos"><i class="icone-m texto-laranja uil uil-heart"></i></a></div>
                </div>
                <a href="pagina-single-anuncio.shtml">
                    <h2 class="mb-5 texto-ret"><strong>Título do anúncio</strong></h2>
                    <p class="texto-m texto-ret mb-5"><span>O estúdio em Curitiba tem 1 quarto e capacidade para 4 pessoas</span></p>
                    <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R$</strong> /noite <span class="texto-marrom texto-p">preço estimado</span></h4>
                </a>
            </div>
        </div>
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
                <a href="/accommodation/{{$result->AccommodationId}}">
                    <div class="slick mb-15">
                        <?php $pictures = json_decode($result->Pictures, true); ?>
                        @if(isset($pictures))
                            <div class="slick mb-15">
                                @foreach ($pictures['Picture'] as $picture)
                                    @if(isset($picture['OriginalURI']) && $picture['OriginalURI'] != '')
                                        <picture style="background-image: url({{$picture['OriginalURI']}});"></picture>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
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
                <a href="/accommodation/{{$result->AccommodationId}}" class="texto-marrom-escuro">
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
            window.location.href = '/searchbydistrict/{{$district}}/'+start.format('YYYY-MM-DD')+'/'+end.format('YYYY-MM-DD');
        });
    });
</script>
</body>


</html>
