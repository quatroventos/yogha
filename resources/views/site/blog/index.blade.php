@extends('site.layouts.site')
@section('content')

<!-- HEADER -->
<header class="mb-30" style="background-image: url(img/fundo-blog.jpg)">
    <div class="container h-100 pt-15">
        <div class="row mb-30">
            <div class="col">
                <a href="index.shtml"><img class="img-m" src="img/logo-yogha-branco.svg"></a>
            </div>
            <div class="col align-items-end justify-content-center">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
            </div>
        </div>
        <div class="row mb-30 h-100 text-center texto-branco h-100">
            <div class="col">
                <h1 class="mb-15"><strong>BLOG</strong></h1>
                <h2 class="texto-fino texto-g">Dicas e ideias para você aproveitar da melhor forma as suas estadias</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group form-inline merge">
                    <input class="d-flex input-2" type="text" name="" placeholder="O que você procura?">
                    <button class="btn btn-2 btn-ico"><i class="uil uil-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- BLOCO --->
<section class="mb-30">
    <div class="container">
        <div class="row mb-10">
            <div class="col">
                <h2><strong>Categorias</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slider slide-auto">
                    <ul>
                        @foreach($cats as $cat)
                            <li><a href="#!" class="btn btn-3 btn-p">{{$cat->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOCO --->
<section class="mb-20">
    <div class="container">
        <div class="row mb-10">
            <div class="col">
                <h2><strong>Últimos posts</strong></h2>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 col-sm-6">
                    <div class="row mb-15">
                        <div class="col col-sm-6 grow-0 pe-0">
                            <a href="{{URL::to('/blog/'.$post->slug)}}" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-blog-single">
                                <picture class="pic-m" style="background-image: url({{URL::to('/files/blog_posts/'.$post->image)}});"></picture>
                            </a>
                        </div>
                        <div class="col col-sm-6 texto-marrom-escuro">
                            <a href="{{URL::to('/blog/'.$post->slug)}}" class="switch" data-bs-toggle="collapse" data-bs-target="#aba-blog-single">
                                <p class="texto-p texto-marrom mb-5"><p class="texto-p texto-marrom mb-5">{{date_format($post->created_at,"d/m \\à\\s H:i")}}</p></p>
                                <h3 class="mb-5"><strong>{{$post->title}}</strong></h3>
                            </a>
                            <a href="#!" class="texto-m texto-laranja">{{$post->category_id}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- BLOCO --->
<section class="text-center mb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="#!" class="btn mx-auto">Mais <i class="uil uil-arrow-down"></i></a>
            </div>
        </div>
    </div>
</section>

@endsection
