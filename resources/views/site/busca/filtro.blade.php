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

    <style>
        #map {
            height: 100%;
            width: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body id="resultado-busca">

<!-- CONTEUDO -->

<section id="aba-resultado" class="aba">
    <div class="container fundo-branco pt-15 h-100">
        <div class="form-group">
            <label for="daterange">Tempo de estadia:</label>
            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
            <input type="hidden" name="startdate" id="startdate" value="{{date('Y-m-d', strtotime($startdate))}}">
            <input type="hidden" name="enddate" id="enddate" value="{{date('Y-m-d', strtotime($startdate))}}">
        </div>
        <div class="form-group">
            <label>Adultos</label>
            <input type="number" class="form-control" name="adults" id="adults">
        </div>
        <div class="form-group">
            <label>Crianças</label>
            <button class="children">Adicionar Criança</button>
        </div>
        <div class="form-group">
            <button id="submit">Enviar</button>
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
            window.location.href = '{{URL::to('/')}}/searchbydistrict/{{Request::segment(2)}}/'+startdate+'/'+enddate+'/'+adults+'/'+children+'/'+ages;
        });
        $(".children").click(function(){
            $('.children').after('<br><label>Idade da criança</label><input type="number" class="form-control age" name="children"><a href="">Remover</a>')
        })
    });
</script>
</body>


</html>
