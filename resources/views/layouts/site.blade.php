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

<body>

<!-- MENU SUPERIOR -->
<nav class="menu-sup hidden">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="index.html"><img src="img/icone-yogha-branco.svg"></a></li>
                    <li><a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="switch"><i class="uil uil-bars"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- MENU INFERIOR -->
<nav class="menu-inf">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-busca"><i class="uil uil-search"></i></a></li>
                    <li><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-loja"><i class="uil uil-shopping-bag"></i></a></li>
                    <li><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-favoritos"><i class="uil uil-heart"></i></a></li>
                    <li><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-mensagens"><i class="uil uil-comment-alt"></i></a></li>
                    <li><a href="#!" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-usuario"><i class="uil uil-user"></i></a></li>
                </ul>
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
                    <li><a href="index.html"><img src="img/logo-yogha.svg"></a></li>
                    <li><a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="switch"><i class="uil uil-times"></i></a></li>
                </ul>
                <ul>
                    <li><a href="#!">Vantagens especiais</a>
                    <li><a href="#!">Alugue seu imóvel</a>
                    <li><a href="#!">Como funciona</a>
                    <li><a href="#!">Quem somos</a>
                    <li><a href="#!">Blog</a>
                    <li><a href="#!">Ajuda</a>
                </ul>
                <ul class="social">
                    <li><a href=""><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href=""><i class="uil uil-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="">Como funciona</a></li>
                    <li><a href="">Perguntas frequentes</a></li>
                </ul>
                <ul>
                    <li><a href="">Quem somos</a></li>
                    <li><a href="">Trabalhe conocsco</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
                <ul>
                    <li><a href="">Política de confidencialidade</a></li>
                    <li><a href="">Política de cookies</a></li>
                    <li><a href="">Condições gerais</a></li>
                </ul>
                <ul>
                    <li><img src="img/logo-yogha.svg"></li>
                </ul>
                <ul>
                    <li><a href="">41. 99694-1949</a></li>
                    <li><a href="">reservas@yogha.com.br</a></li>
                </ul>
                <ul>
                    <li>Rua Riachuelo, 110</li>
                    <li>Centro, Curitiba - PR</li>
                </ul>
                <ul class="social">
                    <li><a href=""><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href=""><i class="uil uil-instagram"></i></a></li>
                </ul>
                <ul class="texto-p">
                    <li>Yogha gestão patrimonial</li>
                    <li>CNPJ: 30.032.993/0001-44</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- OVERLAY -->
<div class="fundo-escuro"></div>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>

<script type="text/javascript">
    $('.switch').on('click', function(e) {
        $('body').toggleClass('overlay');
    });
</script>

<script type="text/javascript">
    var prev = 0;
    var $window = $(window);
    var nav = $('.menu-sup');

    $window.on('scroll', function(){
        var scrollTop = $window.scrollTop();
        nav.toggleClass('hidden', scrollTop > prev);
        prev = scrollTop;
        if (scrollTop < 100) {
            nav.addClass('hidden');
        };
    });
</script>

</body>

</html>
