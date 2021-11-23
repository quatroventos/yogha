
    <div class="container fundo-branco h-100">
        <div class="row pt-15 mb-30" style="background-image: url({{URL::to('/')}}/files/services/{{$service->image}});">
            <div class="col align-items-start justify-content-start">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja-single" class="btn btn-2 btn-ico mb-0"><i class="uil uil-times"></i></a>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col">
                <h2 class="mb-10"><strong>{{$service->title}}</strong></h2>
                <h3>A partir de <strong class="texto-laranja">R${{$service->price}}</strong></h3>
            </div>
        </div>
        <div class="row mb-10">
            <div class="col">
                <h2><strong>Descrição</strong></h2>
            </div>
        </div>
        <div class="row texto-m h-100 scroll-y">
            <div class="col">
                {{$service->description}}
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <a href="#!" class="btn d-flex">Agendar serviço</a>
            </div>
        </div>
    </div>
