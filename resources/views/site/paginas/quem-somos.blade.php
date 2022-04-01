@extends('site.layouts.site')
@section('content')

    <!-- HEADER -->
    <header class="mb-30" style="background-image: url(img/fundo-quem-somos.jpg)">
      <div class="container h-100 pt-15">
        <div class="row mb-30">
          <div class="col">
            <a href="{{URL::to('/')}}"><img class="img-m" src="{{asset('img/logo-yogha-branco.svg')}}"></a>
          </div>
          <div class="col align-items-end justify-content-center">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
          </div>
        </div>
        <div class="row mb-30 h-100 text-center texto-branco">
          <div class="col">
            <h1 class="mb-15"><strong>SINTA-SE EM CASA</strong></h1>
            <h2 class="texto-fino texto-g">Acreditamos que é possível se sentir em casa seja onde estiver</h2>
          </div>
        </div>
      </div>
    </header>

    <!-- BLOCO --->
    <section class="text-center mb-30">
      <div class="container mb-10">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8">
            <h3 class="texto-g texto-fino mb-15">Foi para realizar esse objetivo que nos tornamos especialistas em gestão de canais de hospedagens</h3>
            <p>Nossa missão é oferecer a melhor experiência em hospedagens, tanto para hóspedes como para proprietários.</p>
            <p>A excelência com que realizamos cada locação já conquistou mais de 20.000 hóspedes em Curitiba, desde 2016.</p>
            <p>Isso é fruto da nossa expertise em atendimento ao cliente, mercado imobiliário e hotelaria.</p>
            <p>seu jeito de se hospedar mudou e mudou para melhor!</p>
            <p><strong>Yogha, sinta-se em casa.</strong></p>
          </div>
        </div>
      </div>
    </section>

    <hr class="mb-30">

    <!-- BLOCO --->
    <section class="text-center mb-30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h3 class="mb-15"><strong>NOVIDADE NAS REDES</strong></h3>
            <h3 class="texto-g texto-fino mb-15">Siga nosso @ e fique por dentro de tudo o que rola por aqui!</h3>
          </div>
          <div class="col-12">
            <div class="slider slide-3col mb-15">
              <ul>
                  @for ($i = 0; $i <= 10; $i++)
                      <li>
                          <a href="https://instagram.com/yogha.host" target="_blank">
                            <picture class="d-flex mb-10 pic-g" style="background-image: url({{'insta/images/'.$i.'.png'}});"></picture>
                          </a>
                      </li>
                  @endfor
              </ul>
            </div>
            <a href="https://instagram.com/yogha.host" target="_blank" class="btn mx-auto">@yogha.host</a>
          </div>
        </div>
      </div>
    </section>

@endsection
