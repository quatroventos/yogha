<section class="aba collapse" id="aba-busca">
    <div class="container fundo-branco pt-15 h-100">
        <div class="row mb-15">
            <div class="col px-0 grow-0">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-busca" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col ps-0">
                <input type="text" class="typeahead" placeholder="Digite sua busca">
            </div>
        </div>
        <div class="row mb-30 surpriseme">
            <div class="col">
                <a href="accommodation/{{$surpriseme[0]->AccommodationId}}" class="btn d-flex">Me surpreenda!</a>
            </div>
        </div>
        @if($recently_viewed)
        <div class="row mb-10">
            <div class="col">
                <h2><strong>Acessados recentemente</strong></h2>
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <div class="slider">
                    <ul>
                        @foreach($recently_viewed as $recent)
                            <li>
                                <a href="accommodation/{{$recent->AccommodationId}}" class="btn btn-3 btn-p">
                                    {{$recent->AccommodationName}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="row mb-10">
            <div class="col">
                <h2><strong>Resultados</strong></h2>
            </div>
        </div>
        <div class="row mb-15 h-100 scroll-y">
            <div class="col">
                <ul id="searchResults" class="gap-10 texto-m texto-marrom-escuro">
                </ul>
            </div>
        </div>
    </div>
</section>
