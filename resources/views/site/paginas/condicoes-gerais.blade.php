@extends('site.layouts.site')
@section('content')

    <!-- HEADER -->
    <header class="mb-50 d-none d-md-block" style="background-image: url(img/headers/quem-somos.png)">
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
                    <h1 class="mb-15"><strong>CONDIÇÕES GERAIS</strong></h1>
{{--                    <h2 class="texto-fino texto-g">Acreditamos que é possível se sentir em casa seja onde estiver</h2>--}}
                </div>
            </div>
        </div>
    </header>

    <header class="mb-50 d-block d-md-none" style="background-image: url(img/headers/quem-somos.png)">
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
                    <h1 class="mb-15"><strong>CONDIÇÕES GERAIS</strong></h1>
                    {{--                    <h2 class="texto-fino texto-g">Acreditamos que é possível se sentir em casa seja onde estiver</h2>--}}
                </div>
            </div>
        </div>
    </header>

    <!-- BLOCO --->
    <section class="text-left mb-50">
        <div class="container mb-10">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8">
                        <p>A <strong>YOGHA</strong> é uma empresa que oferece serviços de mercado imobiliário e hotelaria na região de Curitiba-PR. Desde 2016, a <strong>YOGHA</strong> já conquistou mais de 20.000 (vinte e mil) hóspedes.</p>
                        <p>Os serviços se destinam para:</p>
                        <p>a) Hospedagem de apartamentos e estúdios</p>
                        <p>b) Aluguel por temporada</p>
                        <p>c) Venda de estúdio e garagem/parque de estacionamento.</p>
                        <p>d) Adicionais para hospedagem do cliente como manutenção de apartamentos; locação de enxoval de cama e banho; lavanderia Leva e Traz e Limpeza e Conservação.</p>
                        <p>Para saber mais sobre os produtos e quem somos, entre em contato conosco via <em>e-mail </em>“<a href="mailto:reservas@yogha.com.br">reservas@yogha.com.br</a>”; <em>Whatsapp</em> (+55) 41996941949 ou pelo formulário na aba “Contato” no próprio Website.</p></div>
                </div>
            </div>
        </div>
    </section>

@endsection
