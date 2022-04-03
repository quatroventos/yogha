@extends('site.layouts.site')
@section('content')
    <!-- HEADER -->
    <header class="mb-30 pt-15" style="background-image: url('{{'uploads/'.$home['headerimage']}}')">
        <div class="container h-100">
            <div class="row">
                <div class="col">
                    <img class="img-m" src="{{asset('img/logo-yogha-branco.svg')}}">
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row h-100 mb-30 p-0 mt-md-5 p-md-5 align-items-center justify-content-center">
                <div class="col col-sm-6">
                    <h1 class="text-center texto-branco mb-15"><strong>Sinta-se em casa onde estiver</strong></h1>
                    <a href="#!" class="btn d-flex btn-2 mb-15 switch" data-bs-toggle="collapse" data-bs-target="#aba-busca"><i class="uil uil-search"></i> Onde você quer morar hoje?</a>
                    <a href="aluguel/{{$surpriseme[0]->slug}}" class="btn d-flex">Surpreenda-me!</a>
                    </ul>
                </div>
            </div>
        </div>
    </header>

        <?php $title = $home['shelf1_title']; ?>
        @include('site.home.shelf'.$home['shelf1_content'])

        <?php $title = $home['shelf2_title']; ?>
        @include('site.home.shelf'.$home['shelf2_content'])

        <?php $title = $home['shelf3_title']; ?>
        @include('site.home.shelf'.$home['shelf3_content'])

        <?php $title = $home['shelf4_title']; ?>
        @include('site.home.shelf'.$home['shelf4_content'])

        <?php $title = $home['shelf5_title']; ?>
        @include('site.home.shelf'.$home['shelf5_content'])

        <!-- CTA -->
        <section class="mb-30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-sm-6">
                        <h2 class="justify-content-center d-flex mb-10 gap-10"><i class="icone-gg texto-laranja uil uil-house-user"></i> <strong>Uma renda extra para você</strong></h2>
                        <a href="{{URL::to('/alugue')}}" class="btn d-flex">Alugue seu imóvel</a>
                    </div>
                </div>
            </div>
        </section>
@endsection
