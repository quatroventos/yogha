@extends('site.layouts.site')
@section('content')


<!-- CONTEUDO -->

<section class="fixo-t">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col grow-0 px-0">
                <a href="pagina-single-anuncio.shtml" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col align-self-center *justify-content-center">
                <h3 class="text-center"><strong>Confirmar e pagar</strong></h3>
            </div>
            <div class="col grow-0 px-0">
                <span href="#!" class="btn btn-2 btn-ico"></span>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row descricao">
            <div class="col-12 col-sm-4">
                <div class="row mb-30">
                    <div class="col grow-0 pe-0">
                        <?php //dd($pictures);?>
                        @if(isset($pictures))
                            <picture class="pic-p" style="background-image: url({{$pictures['Picture'][0]['OriginalURI']}});"></picture>
                        @endif

                    </div>
                    <div class="col">
                        <p class="texto-m"><strong>O estúdio em Curitiba tem 1 quarto(s)</strong></p>
                        <h2 class="mb-5"><strong>{{$accommodation->AccommodationName}}</strong></h2>
                        <p class="texto-m">
                            @if(empty($accommodation->Capacity) === false)
                                {{$accommodation->Capacity}} hóspedes •
                            @endif
                            @if(empty($features['Distribution']['Bedrooms']) === false)
                                {{$features['Distribution']['Bedrooms']}} quartos •
                            @endif
                            @if($totalcamas > 0)
                                {{$totalcamas}} camas •
                            @endif
                            @if(empty($features['Distribution']['Toilets']) === false)
                                {{$features['Distribution']['Toilets']}} Banheiros
                            @endif
                        </p>
                        <a href="#!" class="btn-link texto-m px-0"><i class="icone-p uil uil-phone"></i> <strong>Reservar por telefone</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Sua estadia</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m mb-5"><strong>Datas</strong></h4>
                        <p class="mb-0">{{date_format(date_create(Request::segment(3)),"d/m/y")}} → {{date_format(date_create(Request::segment(4)),"d/m/y")}}</p>
                    </div>
                    <div class="col grow-0">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-datas" aria-expanded="false" class="btn-link btn-p px-0 switch"><strong>Editar</strong></a>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <h4 class="texto-m mb-5"><strong>Hóspedes</strong></h4>
                        <?php $hospedes = Request::segment(5) + Request::segment(6); ?>
                        <p class="mb-0">{{$hospedes}} hóspede{{($hospedes > 1 ? 's' : '')}}</p>
                    </div>
                    <div class="col grow-0">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-hospedes" aria-expanded="false" class="btn-link btn-p px-0 switch"><strong>Editar</strong></a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Detalhes do preço</strong></h3>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col">
                        <ul class="gap-5 texto-m">
                            <li>R$9,41 x 7 noites</li>
                            <li class="cor-laranja">Desconto semanal</li>
                            <li>Taxa de limpeza</li>
                            <li class="mb-10">Taxa de serviço</li>
                            <li><strong>Total (BLR)</strong></li>
                        </ul>
                    </div>
                    <div class="col grow-0">
                        <ul class="gap-5 text-end texto-m">
                            <li>R$65,87</li>
                            <li class="cor-laranja">-R$3,29</li>
                            <li>R$12,55</li>
                            <li class="mb-10">R$10,61</li>
                            <li><strong>R$85,74</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col d-flex justify-content-end">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja" aria-expanded="false" class="btn btn-4 btn-p ms-auto switch">Adicionar serviço</a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Pagar com</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="gap-10">
                            <li>
                                <a href="#!" data-bs-toggle="collapse" data-bs-target=".campos-cartao" class="row texto-marrom align-items-center">
                                    <div class="col grow-0 pe-0">
                                        <picture></picture>
                                    </div>
                                    <div class="col">
                                        <p class="mb-0">Cartão de crédito</p>
                                    </div>
                                </a>
                            </li>
                            <li class="campos-cartao collapse">
                                <form class="pt-10 mb-30">
                                    <div class="form-group">
                                        <input class="d-flex" type="text" name="" placeholder="Nome no cartão">
                                    </div>
                                    <div class="form-group">
                                        <input class="d-flex" type="text" name="" placeholder="Número do cartão">
                                    </div>
                                    <div class="form-group form-inline">
                                        <input class="d-flex" type="text" name="" placeholder="Validade">
                                        <input class="d-flex" type="text" name="" placeholder="CVV">
                                    </div>
                                    <h3 class="mb-10 d-block text-center texto-m">Endereço de cobrança</h3>
                                    <div class="form-group">
                                        <input class="d-flex" type="text" name="" placeholder="Endereço">
                                    </div>
                                    <div class="form-group">
                                        <input class="d-flex" type="text" name="" placeholder="Número">
                                    </div>
                                    <div class="form-group">
                                        <input class="d-flex" type="text" name="" placeholder="Cidade">
                                    </div>
                                    <div class="form-group form-inline">
                                        <input class="d-flex" type="text" name="" placeholder="Estado">
                                        <input class="d-flex" type="text" name="" placeholder="Cep">
                                    </div>
                                    <button class="btn d-flex">Salvar</button>
                                </form>
                            </li>
                            <li>
                                <a href="#!" class="row texto-marrom align-items-center">
                                    <div class="col grow-0 pe-0">
                                        <picture></picture>
                                    </div>
                                    <div class="col d-inline-flex align-self-center">
                                        <p class="mb-0">Boleto bancário</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="row texto-marrom align-items-center">
                                    <div class="col grow-0 pe-0">
                                        <picture></picture>
                                    </div>
                                    <div class="col d-inline-flex align-self-center">
                                        <p class="mb-0">Opção de pagamento x</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
{{--                <div class="row cupom-desconto collapse">--}}
{{--                    <div class="col">--}}
{{--                        <form class="pt-15">--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="d-flex" type="text" name="" placeholder="Cupom de desconto">--}}
{{--                            </div>--}}
{{--                            <button class="btn d-flex">Salvar</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row mb-30 pt-15">
                    <div class="col">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target=".cupom-desconto" class="btn-link texto-m px-0"><strong>Insira um cupom</strong></a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Dado pessoais</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Nome</strong></h4>
                        <p class="mb-0">Bruno Blanke Pereira</p>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Endereço</strong></h4>
                        <p class="mb-0">Heleodoro João florindo, 155 - Barra da Lagoa, Florianópolis - SC, 88061415</p>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Contato</strong></h4>
                        <p class="mb-0">48 9995-65651</p>
                        <p class="mb-0">brunoblanke@gmail.com</p>
                    </div>
                </div>
                <div class="row texto-m mb-15">
                    <div class="col">
                        <h4 class="texto-m"><strong>Observações</strong></h4>
                        <p class="mb-0">Pensando mais a longo prazo, a expansão dos mercados mundiais aponta para a melhoria das condições financeiras e administrativas exigidas.</p>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <a href="pagina-editar-perfil.shtml" class="btn-link btn-p px-0"><strong>Editar dados</strong></a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Notas adicionais</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col">
                        <p>Horário de entrada: todos os dias de 15:00 a 20:00</p>
                        <p>Horário de saída: 11:00</p>
                        <p>Uns dias antes da chegada deve contactar o escritório de recepção para informar o horário de chegada (nº vôo / barco em caso) e organizar a recolha de chaves.</p>
                        <p>Uma vez que chegue ao destino, por favor contacte-nos por telefone e dirija-se directamente ao alojamento ou ponto de encontro combinado.</p>
                        <div class="conteudo-extra collapse">
                            <p>larira</p>
                        </div>
                        <a href="#!" data-bs-toggle="collapse" data-bs-target=".conteudo-extra" aria-expanded="false" class="btn-link texto-m px-0">
                            <div class="align-items-center mostrar-mais"><strong>Mostrar mais</strong> <i class="icone-m uil uil-angle-down"></i></div>
                            <div class="align-items-center mostrar-menos"><strong>Mostrar menos</strong> <i class="icone-m uil uil-angle-up"></i></div>
                        </a>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-15"><strong>Notas adicionais</strong></h3>
                    </div>
                </div>
                <div class="row texto-m mb-30">
                    <div class="col pe-0 grow-0">
                        <i class="icone-g cor-marrom uil uil-calender"></i>
                    </div>
                    <div class="col">
                        <p class="mb-0">Sua reserva ficará confirmada no momento e terá um débito no seu cartão de crédito pelo montante do depósito de confirmação. Para a sua tranquilidade, a operação realiza-se de forma segura através de uma via de pagamento bancária.</p>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row texto-m mb-15">
                    <div class="col">
                        <p>Autorizo Plataforma Hostings a enviar instruções à instituição financeira que emitiu meu cartão para receber pagamentos da conta do meu cartão, em conformidade com os termos do meu contrato com vocês e aceito as <a href="#!">condições gerais de contratação</a> e a <a href="">política de proteção de dados</a></p>
                    </div>
                </div>
                <div class="row mb-15 justify-content-center">
                    <div class="col col-sm-5">
                        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" aria-expanded="false" class="btn d-flex switch">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
