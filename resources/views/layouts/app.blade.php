<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

        <script src="{{asset('js/checkpw.js')}}"></script>

        <style type="text/css">
            img {
                display: block;
                max-width: 100%;
            }
            .preview {
                overflow: hidden;
                width: 160px;
                height: 160px;
            }
            .modal-lg{
                max-width: 1000px !important;
            }
        </style>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

    <section class="fixo-t">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col grow-0 px-0">
                    <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col align-self-center *justify-content-center">
                    <h3 class="text-center"><strong>Nova conta</strong></h3>
                </div>
                <div class="col grow-0 px-0">
                    <span class="btn btn-2 btn-ico"></span>
                </div>
            </div>
        </div>
    </section>
    <br><br>

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
