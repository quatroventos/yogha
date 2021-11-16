<?php
    $description = json_decode($accommodation[0]->InternationalizedItem, true);
    $pictures = json_decode($accommodation[0]->Pictures, true);
    $local = $description[1]['Region']['Name'];
    //dd($pictures);
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

    <!-- STYLE -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">

    <!-- RESPONSIVE -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

</head>

<body id="single-anuncio">

<!-- CONTEUDO -->

<header class="mb-30">
    <div class="container">
        <div class="row pt-15">
            <div class="col">
                <a href="pagina-resultado-busca.shtml" class="btn btn-2 btn-ico me-auto"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col">
                <div class="form-group form-inline justify-content-end gap-10">
                    <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-upload"></i></a>
                    <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                </div>
            </div>
        </div>
        <div class="row mb-15">
            <div class="col px-0">
                <div class="slick">
                    <?php foreach ($pictures['Picture'] as $picture){ ?>
                        <picture style="background-image: url(<?php echo $picture['OriginalURI']; ?>);"></picture>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="texto-g mb-5">{{$accommodation[0]->AccommodationName}}</h2>
                <h3 class="texto-m mb-5">{{$local}}</h3>
                <p class="texto-m">6 hóspedes • 2 quartos • 3 camas • 2 banheiros</p>
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
                <p>Bem-vindo à Yogha!</p>
                <p>Ao integrar lazer, segurança e tranquilidade, o Helbor Stay Batel by Yogha agrega conforto e ótima estrutura para que você se sinta em casa.</p>
                <div>
                    <div class="conteudo-extra collapse">
                        <p>Conteúdo extra</p>
                    </div>
                </div>
                <a href="#!" data-bs-toggle="collapse" data-bs-target=".conteudo-extra" aria-expanded="false" class="btn-link texto-m px-0 d-flex">
                    <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar mais</strong> <i class="icone-m uil uil-angle-down"></i></p>
                    <p class="align-items-center mb-0 mostrar-menos"><strong> Mostrar menos</strong> <i class="icone-m uil uil-angle-up"></i></p>
                </a>
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
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-wifi"></i> Wifi
                    </li>
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-desktop"></i> Televisão smart
                    </li>
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-snowflake"></i> Ar condicionado
                    </li>
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-accessible-icon-alt"></i> Acessibilidade
                    </li>
                    <li class="d-flex align-items-center gap-10">
                        <i class="icone-gg uil uil-bag"></i> Área de escritório
                    </li>
                    <li>
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
                    </li>
                </ul>
                <a href="#!" data-bs-toggle="collapse" data-bs-target=".lista-extra" aria-expanded="false" class="btn-link texto-m px-0 d-flex">
                    <p class="align-items-center mb-0 mostrar-mais"><strong> Mostrar todas as 27 comodidades</strong> <i class="icone-m uil uil-angle-down"></i></p>
                    <p class="align-items-center mb-0 mostrar-menos"><strong> Esconder</strong> <i class="icone-m uil uil-angle-up"></i></p>
                </a>
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
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14145.8843541857!2d-48.441258572734185!3d-27.578920855907995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95273e5b0a4530f1%3A0x84687ff8c0db3768!2sBarra%20da%20Lagoa%2C%20Florian%C3%B3polis%20-%20SC!5e0!3m2!1spt-BR!2sbr!4v1636255329072!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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

<section class="mb-15">
    <div class="container">
        <div class="row mb-15">
            <div class="col">
                <h4 class="texto-m d-flex gap-5"><i class="icone-m uil uil-star"></i> <strong>9,5</strong> • 2 avaliações</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slider slide-2col depoimentos">
                    <ul>
                        <li>
                            <h3 class="mb-5"><strong>Wagner</strong></h3>
                            <p class="texto-m mb-10">2 horas atrás</p>
                            <p class="mb-0 texto-m">local ótimo e o atendimento impecável, retornarei em breve.</p>
                        </li>
                        <li>
                            <h3 class="mb-5"><strong>Larissa</strong></h3>
                            <p class="texto-m mb-10">Set 2021</p>
                            <p class="mb-0 texto-m">Uma ótima experiência estadia :D</p>
                        </li>
                        <li>
                            <h3 class="mb-5"><strong>Wagner</strong></h3>
                            <p class="texto-m mb-10">2 horas atrás</p>
                            <p class="mb-0 texto-m">local ótimo e o atendimento impecável, retornarei em breve.</p>
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
                <h4 class="texto-m d-flex gap-5 mb-5"><strong class="texto-laranja">R$45</strong> /noite</h4>
                <h4 class="texto-m d-flex gap-5"><i class="icone-m texto-laranja uil uil-star"></i> <strong>9,5</strong> (200)</h4>
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

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

</body>

</html>
