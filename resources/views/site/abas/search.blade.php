<section class="aba collapse" id="aba-busca">
    <div class="container fundo-branco pt-15 h-100">
        <div class="row align-items-center">
            <div class="col align-self-start px-10 grow-0">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-busca" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col mb-15 ps-0 ps-sm-2">
                <input type="text" value="" class="typeahead" placeholder="Digite sua busca">
            </div>
            <div class="col-12 mb-15 col-sm-5">
                <a href="/aluguel/{{$surpriseme[0]->slug}}" class="btn d-flex">Surpreenda-me!</a>
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
                                <a href="/aluguel/{{$recent->slug}}" class="btn btn-3 btn-p">
                                    <strong>{{$recent->AccommodationName}}</strong>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="row mb-10 bairros">
            <div class="col">
                <h2><strong>Bairros</strong></h2>
            </div>
        </div>
        <div class="row mb-15 h-50 scroll-y">
            <div class="col">
                <ul id="searchResults" class="gap-10 texto-m texto-marrom-escuro lista-colunas">
                </ul>
            </div>
        </div>

        <div class="row mb-10 acomodacoes">
            <div class="col">
                <h2><strong>Acomodações</strong></h2>
            </div>
        </div>
        <div class="row mb-15 h-100 scroll-y">
            <div class="col">
                <ul id="searchResults2" class="gap-10 texto-m texto-marrom-escuro lista-colunas">
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
if(isset($district)){
    $district = $district;
}else{
    $district = '';
}
?>

<!-- TYPEAHEAD -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script type="text/javascript">
    $('.bairros').hide();
    $('.acomodacoes').hide();
    function capitalize(string){
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    var path = "{{ url('autocomplete-search-query') }}";

    $( document ).ready(function(){
        $(".typeahead").eq(0).val("{{$district}}").trigger("input");
        $(".typeahead").eq(0).val("{{$district}}");
    })


    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {

                if (data.Districts.length != 0) {
                    $('.bairros').show();
                }

                if (data.Accommodations.length != 0) {
                    $('.acomodacoes').show();
                }

                $('#searchResults').empty();
                $.each(data.Districts, function( index, value ) {
                    $('#searchResults').append('<li><a href="{{URL::to('/')}}/searchfilter/'+data["Districts"][index]["District"]+'" class="d-flex gap-10 align-items-center"><picture class="row-0 me-15" style="background-image: url({{asset('img/fundo-ponto.jpg')}});"></picture>'+capitalize(data["Districts"][index]["District"])+' - '+data["Districts"][index]["City"]+'</a></li>')
                });

                // str = JSON.stringify(data.Accommodations);
                // str = JSON.stringify(data.Accommodations, null, 4); // (Optional) beautiful indented output.
                // console.log(str); // Logs output to dev tools console.
                // alert(str); // Displays output using window.alert()

                $('#searchResults2').empty();
                $.each(data.Accommodations, function( index, value ) {
                    $('#searchResults2').append('<li><a href="{{URL::to('/')}}/aluguel/'+data["Accommodations"][index]["slug"]+'" class="d-flex gap-10 align-items-center"><picture class="row-0 me-15" style="background-image: url({{asset('img/fundo-ponto.jpg')}});"></picture>'+data["Accommodations"][index]["AccommodationName"]+' - '+data["Accommodations"][index]["District"]+'</a></li>')
                });

            });
        },
        hint: false,
        minLength: 1
    });

</script>
