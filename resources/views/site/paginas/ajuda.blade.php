@extends('site.layouts.site')
@section('content')

    <!-- HEADER -->
    <header class="mb-30" style="background-image: url(img/fundo-ajuda.jpg)">
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
            <h1 class="mb-15"><strong>PERGUNTAS FREQUENTES</strong></h1>
            <h2 class="texto-fino texto-g">Queremos esclarecer todas as dúvidas que você possa ter</h2>
          </div>
        </div>
      </div>
    </header>

    <!-- BLOCO --->
    <section>
      <div class="container mb-15">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-1" class="row texto-marrom-escuro mb-15">
              <div class="col">
                <p class="mb-0"><strong>Como faço para cancelar minha reserva de uma acomodação?</strong></p>
              </div>
              <div class="col d-inline-flex align-self-center grow-0">
                <i class="icone-m uil uil-angle-right"></i>
              </div>
            </a>
            <div class="row collapse mb-15" id="cont-extra-1">
              <div class="col texto-m">
                <p class="mb-15">Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
              </div>
            </div>
            <hr class="mb-15">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-2" class="row texto-marrom-escuro mb-15">
              <div class="col">
                <p class="mb-0"><strong>Que formas de pagamento o Yogha aceita?</strong></p>
              </div>
              <div class="col d-inline-flex align-self-center grow-0">
                <i class="icone-m uil uil-angle-right"></i>
              </div>
            </a>
            <div class="row collapse mb-15" id="cont-extra-2">
              <div class="col texto-m">
                <p>Aceitamos diferentes formas de pagamento de acordo com o país em que sua conta de pagamento está localizada. Além dos principais cartões de crédito e débito, algumas opções de pagamento estão disponíveis em países específicos.</p>
                <p>Mostraremos quais formas de pagamento estão disponíveis na página de checkout, antes de você enviar um pedido de reserva. Depois de selecionar o seu país, todas as suas informações de pagamento serão exibidas.</p>
                <p>Opções de pagamento disponíveis na maioria dos países</p>
                <ul>
                  <li>A maioria dos principais cartões de crédito e cartões de crédito pré-pagos (Visa, MasterCard, Amex e JCB), além de vários cartões de débito, que podem ser processados como cartões de crédito</li>
                  <li>Apple Pay</li>
                  <li>Google Pay</li>
                  <li>PayPal</li>
                </ul>
              </div>
            </div>
            <hr class="mb-15">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-3" class="row texto-marrom-escuro mb-15">
              <div class="col">
                <p class="mb-0"><strong>Como faço para desativar ou excluir minha conta?</strong></p>
              </div>
              <div class="col d-inline-flex align-self-center grow-0">
                <i class="icone-m uil uil-angle-right"></i>
              </div>
            </a>
            <div class="row collapse mb-15" id="cont-extra-3">
              <div class="col texto-m">
                <p>Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
              </div>
            </div>
            <hr class="mb-15">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-4" class="row texto-marrom-escuro mb-15">
              <div class="col">
                <p class="mb-0"><strong>Como funcionam os impostos para os proprietários?</strong></p>
              </div>
              <div class="col d-inline-flex align-self-center grow-0">
                <i class="icone-m uil uil-angle-right"></i>
              </div>
            </a>
            <div class="row collapse mb-15" id="cont-extra-4">
              <div class="col texto-m">
                <p>Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
              </div>
            </div>
            <hr class="mb-15">
            <a href="#!" data-bs-toggle="collapse" data-bs-target="#cont-extra-5" class="row texto-marrom-escuro mb-15">
              <div class="col">
                <p class="mb-0"><strong>Como faço para adicionar uma forma de pagamento?</strong></p>
              </div>
              <div class="col d-inline-flex align-self-center grow-0">
                <i class="icone-m uil uil-angle-right"></i>
              </div>
            </a>
            <div class="row collapse mb-15" id="cont-extra-5">
              <div class="col texto-m">
                <p>Não obstante, a constante divulgação das informações estende o alcance e a importância das condições financeiras e administrativas exigidas.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
