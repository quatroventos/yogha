@extends('site.layouts.site')
@section('content')
    <!-- HEADER -->
    <header class="mb-30" style="background-image: url(img/fundo-trabalhe-conoco.jpg)">
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
            <h1 class="mb-15"><strong>TRABALHE CONOSCO</strong></h1>
            <h2 class="texto-fino texto-g">Queremos você no nosso time!</h2>
          </div>
        </div>
      </div>
    </header>

    <!-- BLOCO --->
    <section class="text-center mb-30">
      <div class="container mb-10">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8">
            <h3 class="texto-g texto-fino mb-15">Sabemos como é importante confiar que o local onde você estará oferecerá tudo o que você precisa</h3>
            <p><strong>Pensando nisso é que desenvolvemos o programa Yogha Corporativo, para ajudar você com todas as facilidades que podemos oferecer.</strong></p>
            <p>Nossa missão é oferecer a melhor experiência em hospedagens, tanto para hóspedes como para proprietários. Entregamos a tranquilidade que você sempre quis com o retorno financeiro que você merece.</p>
          </div>
        </div>
      </div>
    </section>

    <hr class="mb-30">

    <!-- BLOCO --->
    <section class="text-center">
      <div class="container mb-10">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-6">
            <h3 class="texto-g texto-fino mb-15">Deixe o trabalho duro com a gente</h3>
            <p><strong>Anuncie seu imóvel na Yogha</strong></p>
            <p class="texto-m">Locação com tranquilidade e rentabilidade.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- BLOCO --->
    <section class="mb-30">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-6">
            <form>
              <div class="form-group">
                <input class="d-flex" type="text" name="Nome" placeholder="Nome">
              </div>
              <div class="form-group">
                <input class="d-flex" type="text" name="Sobrenome" placeholder="Sobrenome">
              </div>
              <div class="form-group">
                <input class="d-flex" type="email" name="E-mail" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input class="d-flex" type="text" name="Empresa" placeholder="Empresa">
              </div>
              <div class="form-group">
                <input class="d-flex" type="text" name="Localização" placeholder="Localização">
              </div>
              <div class="form-group">
                <select class="d-flex">
                  <option>Tipo</option>
                  <option>Tipo A</option>
                  <option>Tipo B</option>
                  <option>Tipo C</option>
                </select>
              </div>
              <div class="form-group">
                <input class="d-flex" type="text" name="Empresa" placeholder="Empresa">
              </div>
              <div class="form-group">
                <textarea placeholder="Observações" class="d-flex"></textarea>
              </div>
              <div class="form-group form-check mb-10">
                <input type="checkbox" class="form-check-input" id="aceito">
                <label class="form-check-label" for="aceito">Lí e aceito a <a href="#!">política de confidencialidade</a> e as <a href="#!">condições gerais</a></label>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="aceito">
                <label class="form-check-label" for="aceito">Concordo em receber informações comerciais</label>
              </div>
              <button class="btn d-flex">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </section>

@endsection
