<section class="aba collapse" id="aba-busca">
    <div class="container fundo-branco pt-15 h-100">
        <div class="row align-items-center">
            <div class="col align-self-start px-0 grow-0">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-busca" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col mb-15 ps-0 ps-sm-2">
                <input type="text" value="@if(isset($district) != ''){{$district}}@endif" class="typeahead" placeholder="Digite sua busca">
            </div>
            <div class="col-12 mb-15 col-sm-5">
                <a href="accommodation/{{$surpriseme[0]->AccommodationId}}" class="btn d-flex">Surpreenda-me!</a>
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
                                    <strong>{{$recent->AccommodationName}}</strong>
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
                <ul id="searchResults" class="gap-10 texto-m texto-marrom-escuro lista-colunas">
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- TYPEAHEAD -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script type="text/javascript">

    $('input.typeahead').keyup(function(){
        $('.surpriseme').hide();
    });
    var path = "{{ url('autocomplete-search-query') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {

                $('#searchResults').empty();
                $.each(data, function( index, value ) {
                    $('#searchResults').append('<li><a href="{{URL::to('/');}}/searchbydistrict/'+data[index]["District"]+'" class="d-flex gap-10 align-items-center"><picture class="row-0 me-15" style="background-image: url({{asset('img/fundo-ponto.jpg')}});"></picture>'+data[index]["District"]+' - '+data[index]["District"]+'</a></li>')
                });

            });
        },
        hint: false,
        minLength: 1
    });
</script>
