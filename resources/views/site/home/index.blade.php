@extends('site.layouts.site')
@section('content')

    <!-- HEADER -->
    <header class="mb-30 pt-15">
        <div class="container h-100">
            <div class="row">
                <div class="col">
                    <img class="img-m" src="{{asset('img/logo-yogha-branco.svg')}}">
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row h-100 mb-30 align-items-center justify-content-center">
                <div class="col col-sm-6">
                    <h1 class="text-center texto-branco mb-15"><strong>Sinta-se em casa onde estiver</strong></h1>
                    <a href="#!" class="btn d-flex btn-2 mb-15 switch" data-bs-toggle="collapse" data-bs-target="#aba-busca"><i class="uil uil-search"></i> Onde você quer morar hoje?</a>
                    <a href="accommodation/{{$surpriseme[0]->AccommodationId}}" class="btn d-flex">Me surpreenda!</a>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!-- PROXIMIDADE -->

    <?php foreach($shelves as $shelf){ ?>
        <section class="mb-15">
            <div class="container">
                <div class="row mb-10">
                    <div class="col">
                        <h2><strong><?php echo $shelf->title; ?></strong></h2>
                    </div>
                </div>
                @php
                    $layout = $shelf->layoutfile;
                @endphp
                @include($layout, ['accommodations' => $accommodations])
            </div>
        </section>
    <?php } ?>

        <!-- MAPA -->
        <section class="mapa-chamada mb-30">
            <div class="container">
                <div class="row mx-0">
                    <div class="col">
                        <div class="row align-items-center justify-content-between">
                            <div class="col mb-10 grow-0 pe-0">
                                <i class="icone-g uil uil-map-marker"></i>
                            </div>
                            <div class="col mb-10">
                                <h3><strong>Título da categoria</strong></h3>
                                <h4 class="texto-m"><strong>15 opções</strong> perto de você</h4>
                            </div>
                            <div class="col-12 col-sm-5">
                                <a href="pagina-resultado-busca.shtml" class="btn d-flex btn-2">Mostrar no mapa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- AVALIADOS -->
        <section class="mb-15">
            <div class="container">
                <div class="row mb-10">
                    <div class="col">
                        <h2><strong>Mais bem avaliados</strong></h2>
                    </div>
                </div>
                <div class="slider slide-3col">
                    <ul>
                        <?php foreach($accommodations as $accommodation){
                            $pictures = json_decode($accommodation->Pictures, true);
                            if(isset($pictures['Picture'][0]['PreparedURI'])){
                                $thumbnail = $pictures['Picture'][0]['ThumbnailURI'];
                            }
                            ?>
                        <li>
                            <a href="pagina-single-anuncio.shtml" class="texto-marrom-escuro">
                                <picture class="d-flex mb-10" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <h3 class="mb-5">Título do anúncio</h3>
                                <h4 class="texto-m d-flex gap-5"><i class="texto-laranja icone-m uil uil-star"></i> <strong class="texto-laranja" strong>9,5</strong> (200)</h4>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- DESCONTOS -->
        <section class="mb-15">
            <div class="container">
                <div class="row mb-10">
                    <div class="col">
                        <h2><strong>Descontos exclusivos</strong></h2>
                    </div>
                </div>
                <div class="slider slide-3col">
                    <ul>
                        <li>
                            <a href="pagina-single-anuncio.shtml" class="texto-marrom-escuro">
                                <picture class="d-flex mb-10" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <h3 class="mb-5">Título do anúncio</h3>
                                <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R$45</strong> /noite</h4>
                            </a>
                        </li>
                        <li>
                            <a href="pagina-single-anuncio.shtml" class="texto-marrom-escuro">
                                <picture class="d-flex mb-10" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <h3 class="mb-5">Título do anúncio</h3>
                                <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R$45</strong> /noite</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- CORPORATIVO -->
        <section id="corporativo" class="mb-30">
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <div class="col-8 col-sm-4 align-items-start">
                        <h4 class="texto-laranja texto-m mb-10"><strong>Corporativo</strong></h4>
                        <h3 class="texto-branco mb-15">Vantagens especiais para parceiros Yogha</h3>
                        <a href="#!" class="btn btn-2">Saiba mais</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROCURADOS -->
        <section class="mb-15">
            <div class="container">
                <div class="row mb-10">
                    <div class="col">
                        <h2><strong>Mais procurados</strong></h2>
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col">
                        <div class="slider slide-4col text-center texto-m texto-branco">
                            <ul>
                                <li>
                                    <a href="pagina-resultado-busca.shtml">
                                        <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                        <div>
                                            <h3><strong>Título da categoria</strong></h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="pagina-resultado-busca.shtml">
                                        <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                        <div>
                                            <h3><strong>Título da categoria</strong></h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="pagina-resultado-busca.shtml">
                                        <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                        <div>
                                            <h3><strong>Título da categoria</strong></h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="pagina-resultado-busca.shtml">
                                        <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                        <div>
                                            <h3><strong>Título da categoria</strong></h3>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        </section>

        <!-- ESTILO -->
        <section class="mb-15">
            <div class="container">
                <div class="row mb-10">
                    <div class="col">
                        <h2><strong>Qual é o seu estilo?</strong></h2>
                    </div>
                </div>
                <div class="slider slide-4col texto-m texto-branco">
                    <ul>
                        <li>
                            <a href="pagina-resultado-busca.shtml">
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3><strong>Sol e praia</strong></h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="pagina-resultado-busca.shtml">
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3><strong>Sol e praia</strong></h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="pagina-resultado-busca.shtml">
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3><strong>Sol e praia</strong></h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="pagina-resultado-busca.shtml">
                                <picture style="background-image: url(img/fundo-imagem.jpg);"></picture>
                                <div>
                                    <h3><strong>Sol e praia</strong></h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ALUGUE -->
        <section class="mb-30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-sm-6">
                        <h2 class="justify-content-center d-flex mb-10 gap-10"><i class="icone-gg texto-laranja uil uil-house-user"></i> <strong>Uma renda extra para você</strong></h2>
                        <a href="#!" class="btn d-flex">Alugue seu imóvel</a>
                    </div>
                </div>
            </div>
        </section>
@endsection
