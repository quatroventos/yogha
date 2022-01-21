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


</head>

<body class="interna">

<!-- alerta -->
<div class="alerta *ativo"><i class="uil uil-heart"></i> Salvo na sa lista de favoritos!</div>

<!-- MENUS -->

<!-- MENU SUPERIOR -->
<nav class="menu-sup show-t hidden">
    <div class="container">
        <div class="row">
            <div class="col justify-content-center">
                <a href="{{URL::to('/')}}"><img src="{{asset('img/icone-yogha-branco.svg')}}"></a>
            </div>
            <div class="col align-items-end justify-content-center">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="switch"><i class="icone-g texto-branco uil uil-bars"></i></a>
            </div>
        </div>
    </div>
</nav>

<!-- MENU INFERIOR -->
<nav class="menu-inf fixo-b">
    <div class="container">
        <div class="row mx-0 text-center">
            <div class="col px-0">
                <a href="#!" class="btn btn-ico mb-0 switch" data-bs-toggle="collapse" data-bs-target="#aba-busca"><i class="icone-g uil uil-search"></i></a>
            </div>
            <div class="col px-0">
                <a href="#!" class="btn btn-ico mb-0 switch" data-bs-toggle="collapse" data-bs-target="#aba-loja"><i class="icone-g uil uil-shopping-bag"></i></a>
            </div>
            <div class="col px-0">
                @auth
                    <a href="#!" class="btn btn-ico mb-0 switch" data-bs-toggle="collapse" data-bs-target="#aba-favoritos"><i class="icone-g uil uil-heart"></i></a>
                @else
                    <a href="{{URL::to('/login')}}" class="btn btn-ico mb-0" ><i class="icone-g uil uil-heart"></i></a>
                @endauth
            </div>
            <div class="col px-0">
                <a href="#!" class="btn btn-ico mb-0 switch" data-bs-toggle="collapse" data-bs-target="#aba-mensagens"><i class="icone-g uil uil-comment-alt"></i></a>
            </div>
            <div class="col px-0">
                @auth
                <a href="#!" class="btn btn-ico mb-0 switch" data-bs-toggle="collapse" data-bs-target="#aba-usuario"><i class="icone-g uil uil-user"></i></a>
                @else
                    <a href="{{URL::to('/login')}}" class="btn btn-ico mb-0" ><i class="icone-g uil uil-user"></i></a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- MENU LATERAL -->
<nav class="collapse" id="menu-lateral">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="/"><img src="{{asset('img/logo-yogha.svg')}}"></a></li>
                    <li><a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="switch"><i class="uil uil-times"></i></a></li>
                </ul>
                <ul>
                    <li><a href="{{URL::to('/')}}/corporativo">Vantagens especiais</a>
                    <li><a href="{{URL::to('/')}}/alugue">Alugue seu imóvel</a>
                    <li><a href="{{URL::to('/')}}/como-funciona">Como funciona</a>
                    <li><a href="{{URL::to('/')}}/quem-somos">Quem somos</a>
                    <li><a href="{{URL::to('/')}}/blog">Blog</a>
                    <li><a href="{{URL::to('/')}}/ajuda">Ajuda</a>
                </ul>
                <ul class="social">
                    <li><a href="https://www.facebook.com/yogha.host" target="_blank"><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/yogha.host/" target="_blank"><i class="uil uil-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ABAS -->

<!-- ABA DATAS -->
<!--#include virtual="aba-datas.html"-->

<!-- ABA HOSPEDES -->
<!--#include virtual="aba-hospedes.html"-->

<!-- ABA BUSCA -->
@include('site.abas.search', compact('recently_viewed','surpriseme'))

<!-- ABA LOJA -->
@include('site.abas.service_list', compact('services'))

<!-- ABA FAVORITOS -->
@include('site.abas.favorites', compact('favorites'))

<!-- ABA MENSAGENS -->
<!--#include virtual="aba-mensagens.html"-->

<!-- ABA MENSAGENS CONVERSA -->
<!--#include virtual="aba-mensagens-conversa.html"-->

<!-- ABA MENSAGENS NOVA -->
<!--#include virtual="aba-mensagens-nova.html"-->

<!-- ABA USUARIO USUARIO -->
@if (Auth::check())
    @include('site.abas.user', compact('user', 'userreservations'))
@else
    @include('site.abas.login')
@endif

<!-- CONTEUDO -->

@yield('content')

<!-- FOOTER -->
<footer class="pt-30 fundo-marrom-claro text-center texto-marrom">
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <ul class="gap-5 mb-20">--}}
{{--                    <li><a href="#!">Como funciona</a></li>--}}
{{--                    <li><a href="#!">Perguntas frequentes</a></li>--}}
{{--                </ul>--}}
{{--                <ul class="gap-5 mb-20">--}}
{{--                    <li><a href="#!">Quem somos</a></li>--}}
{{--                    <li><a href="#!">Trabalhe conocsco</a></li>--}}
{{--                    <li><a href="#!">Blog</a></li>--}}
{{--                </ul>--}}
{{--                <ul class="gap-5 mb-20">--}}
{{--                    <li><a href="#!">Política de confidencialidade</a></li>--}}
{{--                    <li><a href="#!">Política de cookies</a></li>--}}
{{--                    <li><a href="#!">Condições gerais</a></li>--}}
{{--                </ul>--}}
{{--                <img class="img-m mx-auto mb-20" src="{{asset('img/logo-yogha.svg')}}">--}}
{{--                <ul class="gap-5 mb-20">--}}
{{--                    <li><a href="#!">41. 99694-1949</a></li>--}}
{{--                    <li><a href="#!">reservas@yogha.com.br</a></li>--}}
{{--                </ul>--}}
{{--                <ul class="gap-5 mb-20">--}}
{{--                    <li>Rua Riachuelo, 110</li>--}}
{{--                    <li>Centro, Curitiba - PR</li>--}}
{{--                </ul>--}}
{{--                <ul class="gap-10 mb-20 row justify-content-center">--}}
{{--                    <li class="col grow-0 px-0"><a href="#!"><i class="icone-g uil uil-facebook-f"></i></a></li>--}}
{{--                    <li class="col grow-0 px-0"><a href="#!"><i class="icone-g uil uil-instagram"></i></a></li>--}}
{{--                </ul>--}}
{{--                <ul class="gap-5 mb-30 texto-m">--}}
{{--                    <li>Yogha gestão patrimonial</li>--}}
{{--                    <li>CNPJ: 30.032.993/0001-44</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</footer>

<!-- OVERLAY -->
<a href="#!" class="fundo-escuro"></a>

<!-- SCRIPTS -->

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

</body>

</html>
