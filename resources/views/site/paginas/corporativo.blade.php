@extends('site.layouts.site')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert-success" style="position:relative; top:0; width: 100%; z-index: 9999; padding:14px;">
            <h4>{{ $message }}</h4>
        </div>
    @endif

    <!-- HEADER -->
    <header class="mb-30" style="background-image: url(img/fundo-vantagens-especiais.jpg)">
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
                    <h1 class="mb-15"><strong>VIAJA MUITO A TRABALHO?</strong></h1>
                    <h2 class="texto-fino texto-g">Seja um parceiro Yogha e receba benefícios exclusívos só para você</h2>
                </div>
            </div>
        </div>
    </header>



    <!-- BLOCO --->
    <section class="text-center mb-50">
        <div class="container mb-10">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8">
                    <h3 class="texto-g mb-15"><strong>Sabemos como é importante confiar que o local onde você estará oferecerá tudo o que você precisa</strong></h3>
                    <p>Pensando nisso é que desenvolvemos o programa Yogha Corporativo, para ajudar você com todas as facilidades que podemos oferecer.</p>
                    <p>Nossa missão é oferecer a melhor experiência em hospedagens, tanto para hóspedes como para proprietários. Entregamos a tranquilidade que você sempre quis com o retorno financeiro que você merece.</p>
                </div>
            </div>
        </div>
    </section>

    <hr class="mb-50">

    <!-- BLOCO --->
    <section class="mb-30">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="texto-g mb-10"><strong>COMO FAZEMOS ISSO?</strong></h2>
                    <h3 class="mb-50">Confira as vantagens</h3>
                </div>
            </div>
            <div class="row mb-15">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-tag-alt"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Sistema inteligente de precificação</strong></h2>
                            <h3 class="texto-m">Não sabe como definir o valor da locação? Nosso sistema calcula os melhores valores para as diárias, visando maior taxa de ocupação e rentabilidade para o seu imóvel.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-game-structure"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Divulgação otimizada</strong></h2>
                            <h3 class="texto-m">Chega de criar uma conta diferente em cada plataforma para divulgar seu imóvel. Com a Yogha, você anuncia ao mesmo tempo nos maiores marketplaces de reserva do mundo.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-camera"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Anúncios reais</strong></h2>
                            <h3 class="texto-m">A divulgação é feita com fotos profissionais e com a descrição detalhada do imóvel. Assim, o seu próximo hóspede pode tomar sua decisão com tranquilidade.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-raindrops"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Limpeza impecável</strong></h2>
                            <h3 class="texto-m">Sem tempo para manter tudo organizado quando um novo visitante chega? Nós cuidamos da limpeza, vistoria e troca de enxoval após a saída de cada hóspede.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-headphones"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Suporte 24/7</strong></h2>
                            <h3 class="texto-m">O hóspede precisa fazer check-in às duas da manhã? Sem problemas! Nossos canais de atendimento estão disponíveis 24 horas por dia, 7 dias por semana.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-grin-tongue-wink"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Hóspede em boas mãos</strong></h2>
                            <h3 class="texto-m">Acompanhamos o check in e check out e damos todo suporte, a qualquer hora do dia. Além disso, seu hóspede recebe um kit de boas vindas e pode contratar serviços de limpeza, manutenção e lavanderia.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-paint-tool"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Consultoria para decoração e obra</strong></h2>
                            <h3 class="texto-m">Seu imóvel precisa de uma repaginada? Prestamos assessoria de projeto e execução de obras com parceiros exclusivos para garantir o padrão de qualidade Yogha.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="row mb-15">
                        <div class="col grow-0 pe-0">
                            <i class="icone-gg texto-laranja uil uil-award"></i>
                        </div>
                        <div class="col">
                            <h2 class="mb-5"><strong>Garantia de qualidade</strong></h2>
                            <h3 class="texto-m">O feedback de nossos mais de 20.000 hóspedes garantem nosso padrão de excelência, que já resultou em prêmios internacionais junto ao principais portais de reservas.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="mb-50">

    <!-- BLOCO --->
    <section class="text-center">
        <div class="container mb-10">
            <div class="row">
                <div class="col-12">
                    <h3 class="texto-g mb-15"><strong>Deixe o trabalho duro com a gente</strong></h3>
                    <p>Anuncie seu imóvel na Yogha <br/>Locação com tranquilidade e rentabilidade.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- BLOCO --->
    <section class="mb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <form method="post" action="{{route('send.contactmail')}}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="pagina" value="Alugue seu imóvel">
                        <input type="hidden" name="assunto" value="Nova solicitação para locação">

                        <div class="form-group">
                            <input class="d-flex" type="text" name="nome" placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <input class="d-flex" type="text" name="sobrenome" placeholder="Sobrenome" required>
                        </div>
                        <div class="form-group">
                            <input class="d-flex" type="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input class="d-flex" type="text" name="empresa" placeholder="Empresa">
                        </div>
                        <p class="text-center"><strong>Características dos alojamentos</strong></p>
                        <div class="form-group">
                            <input class="d-flex" type="text" name="alojamentos" placeholder="Número de alojamentos" required>
                        </div>
                        <div class="form-group">
                            <input class="d-flex" type="text" name="localizacao" placeholder="Localização" required>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <select name="tipo" class="d-flex" required>--}}
                        {{--                                <option>Tipo</option>--}}
                        {{--                                <option>Tipo A</option>--}}
                        {{--                                <option>Tipo B</option>--}}
                        {{--                                <option>Tipo C</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <input class="d-flex" type="text" name="empresa" placeholder="Empresa" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Observações" name="obs" class="d-flex"></textarea>
                        </div>

                        <button class="btn d-flex">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
