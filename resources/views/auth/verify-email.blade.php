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
                <a href="{{route('home')}}" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col align-self-center *justify-content-center">
                <h3 class="text-center"><strong>Ops! É necessário verificar seu e-mail.</strong></h3>
            </div>
            <div class="col grow-0 px-0">
                <span class="btn btn-2 btn-ico"></span>
            </div>
        </div>
    </div>
</section>

<!-- usuario senha -->
<section class="h-100">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center mb-30 h-100">
            <div class="col col-sm-6">

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <button type="submit" class="btn  p-0 m-0 align-baseline" style="padding: 0 20px !important;">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="padding: 0 20px !important;">
                        {{ __('Log Out') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>


</body>

</html>
