<section class="aba collapse" id="aba-loja">
    <div class="container fundo-branco pt-15 h-100">
        <div class="row align-items-center">
            <div class="col align-self-start px-0 grow-0">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col mb-15 ps-0 ps-sm-2">
                <h2 class="texto-g mb-5"><strong>Loja Yogha</strong></h2>
                <h3 class="texto-m">Parcerias exclusivas para você dar match em serviços incríveis associados a sua estadia</h3>
            </div>
        </div>

        <div class="row mb-15">
            <div class="col">
                <div class="slider slide-4col text-center texto-m texto-branco">
                    <ul>
                        @foreach($services as $service)
                            <li>
                                <picture style="background-image: url({{URL::to('/')}}/files/services/{{$service->image}});"></picture>
                                <div>
                                    <h3>{{$service->title}} - R$ {{$service->price}}</h3>
                                    <a href="{{URL::to('/checkoutaddtocart/'.$service->id)}}"  class="btn d-flex addToCart" style="margin:20px; width: 80%; font-size:15px;">Adicionr serviço</a>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
