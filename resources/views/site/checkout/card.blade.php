@extends('site.layouts.site')
@section('content')


<!-- CONTEUDO -->

<section class="fixo-t">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col grow-0 px-0">
                <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col align-self-center *justify-content-center">
                <h3 class="text-center"><strong>Lorem Ipsum Dolor Sit Amet</strong></h3>
            </div>
            <div class="col grow-0 px-0">
                <span href="#!" class="btn btn-2 btn-ico"></span>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row descricao">
            <div class="col-12">
                <div class="row texto-m mb-15">
                    <div class="col text-center">
                        <p>
                            Qui ipsorum lingua Celtae, nostra Galli appellantur. Fabio vel iudice vincam, sunt in culpa qui officia. A communi observantia non est recedendum. Ullamco laboris nisi ut aliquid ex ea commodi consequat.
                        </p>
                        <p>
                            Magna pars studiorum, prodita quaerimus. Paullum deliquit, ponderibus modulisque suis ratio utitur. Etiam habebis sem dicantur magna mollis euismod. Curabitur blandit tempus ardua ridiculus sed magna. Pellentesque habitant morbi tristique senectus et netus.
                        </p>
                    </div>
                </div>
                <hr class="mb-30">
                <div class="row texto-m mb-15">
                    <div class="col">
{{--                        <a class="btn btn-primary" href="{{$response['_embedded']['charges'][0]['link']}}" target="_blank">Link para o boleto</a>--}}
                    </div>
                </div>
                <div class="row mb-15 justify-content-center">
                    <div class="col col-sm-5">

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
