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

<body id="filtro-busca">

    <section class="fixo-t">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col grow-0 px-0">
            <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
          </div>
          <div class="col align-self-center *justify-content-center">
            <h3 class="text-center"><strong>Data e Hóspedes</strong></h3>
          </div>
          <div class="col grow-0 px-0">
            <span href="#!" class="btn btn-2 btn-ico"></span>
          </div>
        </div>
      </div>
    </section>

    <section id="">
        <div class="container">
            <div class="row justify-content-center pt-15 mb-15">
                <div class="col col-sm-6">
                    <h2 class="mb-10"><strong>Escolha quando e com quem estará lá</strong></h2>
                    <p class="texto-m">Adicione suas datas e hóspedes de viagem para ver os preços exatos</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-sm-6">
                    <div class="form-group row align-items-center">
                        <label for="daterange" class="texto-m col col-form-label"><strong>Datas</strong></label>
                        <div class="col-9">
                            <input type="text" class="d-flex" name="daterange" />
                            <input type="hidden" name="startdate" id="startdate" value="{{date('Y-m-d', strtotime($startdate))}}">
                            <input type="hidden" name="enddate" id="enddate" value="{{date('Y-m-d', strtotime($startdate))}}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="texto-m col col-form-label"><strong>Adultos</strong></label>
                        <div class="col-9">
                            <input type="number" class="d-flex" name="adults" id="adults" placeholder="1" value="1" min="1" max="99">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-30">
                        <label class="texto-m col col-form-label"><strong>Crianças</strong></label>
                        <div class="col-9">
                            <a href="#!" class="btn btn-3 btn-p children"><i class="uil uil-plus"></i> Adicionar</a>
                        </div>
                    </div>
                    <div class="form-group row children-group">
                        <!--<div class="col-6">
                            <div class="idade">
                                <label><i class="uil uil-kid"></i></label>
                                <input type="number" name="children" placeholder="Idade">
                                <a href="#!" class="btn btn-3 btn-ico"><i class="uil uil-times"></i></a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fixo-b">
      <div class="container pt-15 mb-15">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-5">
            <button id="submit" class="btn">Salvar</button>
          </div>
        </div>
      </div>
    </section>


<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- SLICK -->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            startDate: '{{date('%d/%m/%Y', strtotime($startdate))}}',
            endDate: '{{date('%d/%m/%Y', strtotime($enddate))}}',
            locale: {
                format: 'DD/M/Y'
            }
        }, function(start, end, label) {
            $('#startdate').val(start.format('YYYY-MM-DD'));
            $('#enddate').val(end.format('YYYY-MM-DD'));
        });
        $('#submit').click(function (){
            startdate = $('#startdate').val();
            enddate = $('#enddate').val();
            adults = $('#adults').val();
            children = $('.age').length;
            ages = '';
            $( ".age" ).each(function() {
                value = $(this).val();
                ages = ages+value+',';
            });
            window.location.href = '{{URL::to('/')}}/checkabailability/{{Request::segment(2)}}/'+startdate+'/'+enddate+'/'+adults+'/'+children+'/'+ages;
        });
        $(".children").click(function(){
            $('.children-group').append('<div class="col-6 mb-15"><div class="idade align-items-center"><label><i class="uil uil-kid"></i></label><input type="number" name="children" placeholder="Idade"><a href="#!" class="btn btn-3 btn-ico"><i class="uil uil-times"></i></a></div></div>')
        })
    });
</script>
</body>


</html>
