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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <script src="{{asset('js/checkpw.js')}}"></script>

    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
    </style>

</head>

<body id="editar-perfil">

<section>
    <div class="container">

        @if(isset($user))
        <div class="row mb-15 align-items-center">
            <div class="col px-0 grow-0">
                <a href="javascript:history.back();" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col ps-0">
                <h2 class="texto-g texto-ret"><strong>{{$user->name}} {{$user->surname}}</strong></h2>
            </div>
        </div>
        @endif

        <div class="col">
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" >
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                    {{ $error }}
                </div>
            @endforeach
        </div>

        @if(isset($user))
            <form method="post" action="{{ route('user.update') }}" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$user->id}}">
        @else
            <form method="post" action="{{ route('user.create') }}" autocomplete="off" enctype="multipart/form-data">
        @endif
        @csrf

            @if(isset($user))
            <div class="row justify-content-center">
                <div class="col col-sm-6">
                    <picture class="pic-p mx-auto">
                        <img src="{{URL::to('/files/users/'.$user->profile_pic)}}" id="profile_pic">
                    </picture>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-sm-6">
                    <div class="form-group form-inline justify-content-center gap-0">
                        <input type="file" class="image" name="profile_pic" class="form-control-file">
                        <input type="text" name="oldfile" value="{{$user->profile_pic ??  old('profile_pic') }}">
                        <input type="text" name="imageBlob" id="imageBlob">
                    </div>
                </div>
            </div>
            @endif

            <hr class="mb-30">

            <div class="row justify-content-center mb-15">
                <div class="col col-sm-6">
                    <h3><strong>Dados pessoais</strong></h3>
                </div>
            </div>
            <div class="row justify-content-center mb-15">
                <div class="col col-sm-6">
                    <div class="row">
                        <div class="form-group col-12 col-sm-6 {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="texto-m mb-5 form-control-label" for="name">Nome</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ $user->name ?? old('name') }}" required autofocus >
                            @include('admin.alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group col-12 col-sm-6{{ $errors->has('surname') ? ' has-danger' : '' }}">
                            <label class="texto-m mb-5 form-control-label" for="surname">Sobrenome</label>
                            <input type="text" name="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="Sobrenome" value="{{$user->surname ??  old('surname') }}" required >
                            @include('admin.alerts.feedback', ['field' => 'surname'])
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="email">E-mail</label>
                        <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" value="{{ $user->email ?? old('email') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="phone">Telefone</label>
                        <input type="text" name="phone" class="phone_with_ddd form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Telefone" value="{{$user->phone ??  old('phone') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'phone'])
                    </div>
                    <div class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="birthday">Aniversário</label>
                        <input type="text" name="birthday" class="date form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" placeholder="Aniversário" value="{{implode('/', array_reverse(explode('-', $user->birthday ?? ''))) ?? old('birthday') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'birthday'])
                    </div>
                    <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="cpf">CPF</label>
                        <input type="text" name="cpf" class="cpf form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="CPF" value="{{$user->cpf ??  old('cpf') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'cpf'])
                    </div>
                </div>
            </div>

            <hr class="mb-30">

            <div class="row justify-content-center mb-15">
                <div class="col col-sm-6 mb-15">
                    <h3><strong>Localização</strong></h3>
                </div>
            </div>
            <div class="row justify-content-center mb-15">
                <div class="col col-sm-6">
                    <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="zip_code">CEP</label>
                        <input type="text" name="zip_code" id="cep" class="cep form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" placeholder="CEP" value="{{$user->zip_code ?? old('zip_code') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'zip_code'])
                    </div>
                    <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="street">Rua</label>
                        <input type="text" id="logradouro" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="Rua" value="{{$user->street ?? old('street') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'street'])
                    </div>
                    <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="number">Número</label>
                        <input type="text" id="numero" name="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="Número" value="{{$user->number ?? old('number') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'number'])
                    </div>
                    <div class="form-group{{ $errors->has('complement') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="complement">Complemento</label>
                        <input type="text" name="complement" class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}" placeholder="Complemento" value="{{$user->complement ??  old('complement') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'complement'])
                    </div>
                    <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="district">Bairro</label>
                        <input type="text" id="bairro" name="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" placeholder="Bairro" value="{{$user->district ?? old('district') }}" required >
                        @include('admin.alerts.feedback', ['field' => 'district'])
                    </div>
                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="country">País</label>
                        <select name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"  required >
                            <?php foreach($countries as $country) {?>
                            <option value="<?php echo $country->id; ?>" <?php echo (isset($user) ? ($country->id == $user->country_id ? "selected" : "") : ($country->nome == "Brazil" ? "selected" : ""));?>><?php echo $country->nome; ?></option>
                            <?php } ?>
                        </select>
                        @include('admin.alerts.feedback', ['field' => 'country'])
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="state">Estado</label>
                        <select name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"  >
                            <option>Selecione um país</option>
                        </select>
                        @include('admin.alerts.feedback', ['field' => 'state'])
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                        <label class="texto-m mb-5 form-control-label" for="city">Cidade</label>
                        <select name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  >
                            <option>Selecione um estado</option>
                        </select>
                        @include('admin.alerts.feedback', ['field' => 'city'])
                    </div>
                </div>
            </div>

            <hr class="mb-30">

            <div class="row justify-content-center mb-15">
                <div class="col col-sm-6">
                    <h3><strong>Senha</strong></h3>
                </div>
            </div>
            <div class="row justify-content-center mb-30">
                <div class="col col-sm-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="password">Senha</label>
                        <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Senha" value="{{ old('password') }}" onkeyup="getPassword()" required >
                        @include('admin.alerts.feedback', ['field' => 'password'])
                    </div>
                    <div>
                        <ul class="lead list-group" id="requirements">
                            <li id="length" class="list-group-item">Pelo menos 8 caracteres</li>
                            <li id="lowercase" class="list-group-item">Ao menos 1 letra minúscula</li>
                            <li id="uppercase" class="list-group-item">Ao menos 1 letra maiúscula</li>
                            <li id="number" class="list-group-item">Ao menos 1 número</li>
                            <li id="special" class="list-group-item">Ao menos 1 caractere especial</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-15">
                <div class="col col-sm-5">
                    <button type="submit" class="btn d-flex">Salvar</button>
                </div>
            </div>

        </form>
    </div>
</section>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="crop">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Masks -->
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $('#imageBlob').val(base64data);
                $('#profile_pic').attr('src', base64data);
                $modal.modal('hide');
            }
        });
    })

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
</script>

<script>
    $(document).ready(function(){

        @if(isset($user))
        $.ajax({
            type:'GET',
            url:'/states/{{$user->country_id}}',
            success:function(html){
                $('#state').html(html).delay( 200 ).val({{$user->state_id}});
            }
        });
        $.ajax({
            type:'GET',
            url:'/cities/{{$user->state_id}}',
            success:function(html){
                $('#city').html(html).delay( 200 ).val({{$user->city_id}});
            }
        });
        @else
        $.ajax({
            type:'GET',
            url:'/states/1',
            success:function(html){
                $('#state').html(html);
                $('#city').html('<option value="">Selecione um estado</option>');
            }
        });
        @endif


        $('#country').on('change', function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'GET',
                    url:'/states/'+countryID,
                    success:function(html){
                        $('#state').html(html);
                        $('#city').html('<option value="">Selecione um estado</option>');
                    }
                });
            }else{
                $('#state').html('<option value="">Selecione um país</option>');
                $('#city').html('<option value="">Selecione um estado </option>');
            }
        });
    });

    $(function() {
        $(document).delegate('#state', 'change', function() {
            var stateID = $('#state').val();
            $('#city').load('/cities/' + stateID );
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });
</script>

<script type="text/javascript">
    $("#cep").focusout(function(){
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
                $("#logradouro").val(resposta.logradouro);
                $("#complemento").val(resposta.complemento);
                $("#bairro").val(resposta.bairro);
                $("#state option[rel='"+resposta.uf+"']").attr("selected", "selected");
                var stateID = $('#state').val();
                $('#city').load('/cities/' + stateID, function(){
                    $("#city option[rel='"+resposta.localidade+"']").attr("selected", "selected");
                });
                $("#numero").focus();
            }
        });
    });
</script>

</body>

</html>
