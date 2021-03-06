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

@env('local')
    <div class="alerta ativo" style="color: white; background: red; top:0; height: 10px; width: 30%; margin:10px auto; opacity:.5;"> <i class="fa-solid fa-vial"></i> Ambiente de testes </div>
@endenv

    <section class="fixo-t">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col grow-0 px-0">
            <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
          </div>
          <div class="col align-self-center *justify-content-center">
            <h3 class="text-center"><strong>Data e H??spedes</strong></h3>
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
                    <h2 class="mb-10"><strong>Escolha quando e com quem estar?? l??</strong></h2>
                    <p class="texto-m">Adicione suas datas e h??spedes de viagem para ver os pre??os exatos</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-sm-6">
                    <div class="form-group row align-items-center">
                            <label for="daterange" class="texto-m col col-form-label"><strong>Datas</strong></label>
                        <div class="col-9">
                            <input type="text" autocomplete="off" name="date_range" id="datepicker" value="{{date('Y-m-d', strtotime('+ 1 day', strtotime($startdate)))}} - {{date('Y-m-d', strtotime('+ 1 day', strtotime($enddate)))}}">
                            <input type="hidden" name="startdate" id="startdate" value="{{date('Y-m-d', strtotime($startdate))}}">
                            <input type="hidden" name="enddate" id="enddate" value="{{date('Y-m-d', strtotime($enddate))}}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="texto-m col col-form-label"><strong>Adultos</strong></label>
                        <div class="col-9">
                            <input type="number" class="d-flex" name="adults" id="adults" placeholder="1" value="{{ Request::segment(5) ?? "1"}}" min="1" max="99" >
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-30">
                        <label class="texto-m col col-form-label"><strong>Crian??as</strong></label>
                        <div class="col-9">
                            <a href="#!" class="btn btn-3 btn-p children"><i class="uil uil-plus"></i> Adicionar</a>
                        </div>
                    </div>
                    <div class="form-group row children-group">
                        @if(Request::segment(7))
                            <?php $children = explode(',',Request::segment(7)); ?>
                            @foreach($children as $key => $child)
                                <div class="col-6 mb-15">
                                    <div class="idade align-items-center">
                                        <label><i class="uil uil-kid"></i></label>
                                        <input type="number" class="age" name="children" id="children" placeholder="Idade" value="{{$child}}">
                                        <a href="#!" class="btn btn-3 btn-ico delchild"><i class="uil uil-times"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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

<!-- DATE PICKER -->
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>

<!-- FUNCOES -->
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

<script>
    $(function() {

        $(".children").click(function(){
            $('.children-group').append('<div class="col-6 mb-15"><div class="idade align-items-center"><label><i class="uil uil-kid"></i></label><input type="number" class="age" name="children" id="children" placeholder="Idade"><a href="#!" class="btn btn-3 btn-ico delchild"><i class="uil uil-times"></i></a></div></div>')
        });
        $(".children-group").on('click','.delchild', function(){
            $(this).prev().remove();
            $(this).parent().remove();
            $(this).parent().parent().remove();
            $(this).remove();
        });

        $('#submit').click(function (){
            startdate = $('#startdate').val();
            enddate = $('#enddate').val();
            adults = $('#adults').val();
            children = $('.age').length;
            ages = '';
            $( ".age" ).each(function(index) {
                len = $('.age').length;
                value = $(this).val();
                if (index === (len - 1)){
                    ages = ages+value;
                }else{
                    ages = ages+value+',';
                }

            });
            window.location.href = '{{URL::to('/')}}/searchbydistrict/{{Request::segment(2)}}/'+startdate+'/'+enddate+'/'+adults+'/'+children+'/'+ages;
        });

        var picker = new Litepicker({
            element: document.getElementById('datepicker'),
            format: 'DD/MM/YYYY',
            disallowLockDaysInRange: true,
            allowRepick: true,
            inlineMode: false,
            singleMode: false,
            minDate: '<?php echo date('Y-m-d', time()); ?>',
            numberOfColumns: 2,
            numberOfMonths: 2,
            tooltipText: {
                one: ' noite',
                other: 'noites'
            },
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            }
        });
        picker.on('selected', (date1, date2) => {
            $('#startdate').val(date1.format('YYYY-MM-DD'));
            $('#enddate').val(date2.format('YYYY-MM-DD'));
        });
    });
</script>
</body>


</html>
