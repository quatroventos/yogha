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

        <!-- DATE RANGE -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <!-- GOOGLE MAPS -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSeQcKPvoa7ix-NIn8yf_gRlBqv4QtaYI&v=weekly&channel=2" ></script>

    </head>

    <body id="usuario-login">

        <section class="fixo-t">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col grow-0 px-0">
                        <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
                    </div>  
                    <div class="col align-self-center *justify-content-center">
                        <h3 class="text-center"><strong>Login</strong></h3>
                    </div> 
                    <div class="col grow-0 px-0">
                        <span class="btn btn-2 btn-ico"></span>
                    </div>         
                </div>
            </div>      
        </section>

        <!-- usuario login -->
        <section class="h-100">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center mb-30 h-100">
                    <div class="col col-sm-6">
                        <img class="img-g mb-15 mx-auto" src="img/logo-yogha.svg">
                        <h2 class="text-center mb-10"><strong>Estamos felizes em ter você aqui!</strong></h2>
                        <h3 class="text-center mb-15">Entre e aproveite todos os recursos que preparamos para você.</h3>
                        <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', 'admin@lightbp.com') }}" required autocomplete="email" placeholder="E-mail" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-inline merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror d-flex senha" name="password" value="{{ old('password', 'secret') }}" required autocomplete="current-password" placeholder="••••••••">
                                <a href="#!" class="btn btn-4 btn-ico mostrar-senha"><i class="uil uil-eye-slash"></i></a>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn d-flex">Entrar</button>
                            </div>
                            <div class="form-group">     
                                <a href="{{ route('register') }}" class="btn btn-4 d-flex">Cadastrar</a>
                            </div>
                            <div class="form-group form-check">
                                <a href="{{ route('password.request') }}" class="btn-link btn-p px-0"><strong>Esqueci a senha</strong></a>
                                <input type="checkbox" class="form-check-input" id="lembrar">
                                <label class="form-check-label" for="lembrar" type="checkbox" name="remember" id="remember">Lembre de mim</label>                  
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </section>

    </body>

</html>