@extends('site.layouts.site')
@section('content')


    <!-- HEADER -->
    <header class="mb-50 d-none d-md-block" style="background-image: url(img/headers/como-funciona.png)">
        <div class="container h-100 pt-15">
            <div class="row mb-30">
                <div class="col">
                    <a href="{{URL::to('/')}}"><img class="img-m" src="img/logo-yogha-branco.svg"></a>
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row mb-30 h-100 text-center texto-branco">
                <div class="col">
                    <h1 class="mb-15"><strong>COMO FUNCIONA</strong></h1>
                    <h2 class="texto-fino texto-g">Siga o caminho sugerido e encontre as melhores experiências</h2>
                </div>
            </div>
        </div>
    </header>

    <header class="mb-50 d-block d-md-none" style="background-image: url(img/headers/como-funciona.png)">
        <div class="container h-100 pt-15">
            <div class="row mb-30">
                <div class="col">
                    <a href="{{URL::to('/')}}"><img class="img-m" src="img/logo-yogha-branco.svg"></a>
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row mb-30 h-100 text-center texto-branco">
                <div class="col">
                    <h1 class="mb-15"><strong>COMO FUNCIONA</strong></h1>
                    <h2 class="texto-fino texto-g">Siga o caminho sugerido e encontre as melhores experiências</h2>
                </div>
            </div>
        </div>
    </header>

    <!-- BLOCO --->
    <section class="text-center etapas mb-30">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>LOCALIZAÇÂO</strong></h3>
                    <p class="texto-g texto-fino mb-15">Escolha o local onde você vai estar ou está agora mesmo</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-localizacao.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>DATAS</strong></h3>
                    <p class="texto-g texto-fino mb-15">Selecione o período que deseja se hospedar</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-datas.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>HÓSPEDES</strong></h3>
                    <p class="texto-g texto-fino mb-15">E quantas pessoas estarão com você, adultos e crianças</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-hospedes.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>HOSPEDAGEM</strong></h3>
                    <p class="texto-g texto-fino mb-15">Escolha a hospedagem que oferece tudo o que você precisa</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-hospedagem.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>SERVIÇOS</strong></h3>
                    <p class="texto-g texto-fino mb-15">Adicione serviços extras para sua comodidade</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-servicos.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="co4-12 col-sm-4">
                    <h3 class="mb-10"><strong>RESERVA</strong></h3>
                    <p class="texto-g texto-fino mb-15">Confira os detalhes da sua estadia, confirme a reserva e pronto!</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-reserva.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <h3 class="mb-10"><strong>APROVEITE!</strong></h3>
                    <p class="texto-g texto-fino mb-15">Os detalhes da sua reserva chegarão em seu e-mail de contato</p>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <img src="img/etapas/etapa-aproveite.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
