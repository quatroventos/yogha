@extends('admin.layouts.app', ['activePage' => 'user', 'title' => 'Yogha - Admin v1.0.0 - Usuários', 'navName' => 'Editar prateleira', 'activeButton' => 'user'])

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<style type="text/css">
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 4px solid #f7f7f7;
        border-radius: 160px;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
@section('content')
 @if(\Session::get('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">
                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">Usuário</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(isset($user))
                                <form method="post" action="{{ route('user.update') }}" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                            @else
                                <form method="post" action="{{ route('user.create') }}" autocomplete="off" enctype="multipart/form-data">
                            @endif
                            @csrf

                                <h6 class="heading-small text-muted mb-4">Informações do usuário</h6>

                                @include('admin.alerts.success')
                                @include('admin.alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="name">Nome</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ $user->name ?? old('name') }}" required autofocus >
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="surname">Sobrenome</label>
                                            <input type="text" name="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="Sobrenome" value="{{$user->surname ??  old('surname') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'surname'])
                                        </div>

                                        <div class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="birthday">Aniversário</label>
                                            <input type="text" name="birthday" class="date form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" placeholder="Aniversário" value="{{implode('/', array_reverse(explode('-', $user->birthday ?? ''))) ?? old('birthday') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'birthday'])
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="phone">Telefone</label>
                                            <input type="text" name="phone" class="phone_with_ddd form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Telefone" value="{{$user->phone ??  old('phone') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'phone'])
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="email">E-mail</label>
                                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" value="{{ $user->email ?? old('email') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'email'])
                                        </div>

                                        <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="cpf">CPF</label>
                                            <input type="text" name="cpf" class="cpf form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="CPF" value="{{$user->cpf ??  old('cpf') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'cpf'])
                                        </div>

                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="role_id">País</label>
                                            <select name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"  required >
                                                <?php foreach($countries as $country) {?>
                                                <option value="<?php echo $country->id; ?>" <?php echo (isset($user) ? ($country->id == $user->country_id ? "selected" : "") : ($country->nome == "Brazil" ? "selected" : ""));?>><?php echo $country->nome; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'country'])
                                        </div>

                                        <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="role_id">Estado</label>
                                            <select name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"  >
                                                <option>Selecione um país</option>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'state'])
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="role_id">Cidade</label>
                                            <select name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  >
                                                <option>Selecione um estado</option>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'city'])
                                        </div>

                                        <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="district">Bairro</label>
                                            <input type="text" name="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" placeholder="Bairro" value="{{$user->district ?? old('district') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'district'])
                                        </div>

                                        <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="zip_code">CEP</label>
                                            <input type="text" name="zip_code" class="cep form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" placeholder="CEP" value="{{$user->zip_code ?? old('zip_code') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'zip_code'])
                                        </div>

                                        <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="street">Rua</label>
                                            <input type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="Rua" value="{{$user->street ?? old('street') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'street'])
                                        </div>

                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="number">Número</label>
                                            <input type="text" name="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="Número" value="{{$user->number ?? old('number') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'number'])
                                        </div>

                                        <div class="form-group{{ $errors->has('complement') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="complement">Complemento</label>
                                            <input type="text" name="complement" class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}" placeholder="Complemento" value="{{$user->complement ??  old('complement') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'complement'])
                                        </div>

                                        @if(!isset($user))
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="password">Senha</label>
                                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Senha" value="{{ old('password') }}" required >
                                            @include('admin.alerts.feedback', ['field' => 'password'])
                                        </div>
                                        @endif

                                        <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="role_id">Permissões</label>
                                            <select name="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}"  required >
                                                <?php foreach($roles as $role) {?>
                                                <option value="<?php echo $role->id; ?>"><?php echo $role->title; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'role_id'])
                                        </div>

                                        <div class="form-group{{ $errors->has('profile_pic') ? ' has-danger' : '' }}">
                                            <label for="profile_pic">Foto do perfil</label>
                                            <input type="file" class="image" name="profile_pic" class="form-control-file">
                                            <input type="hidden" name="oldfile" value="{{$user->profile_pic ??  old('profile_pic') }}">
                                            <input type="hidden" name="imageBlob" id="imageBlob">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-default mt-4">Salvar</button>
                                        </div>
                                </div>
                            </form>
                        </div>

                        @if(isset($user))
                            <hr class="my-4" />
                            <div class="card-body">
                                    <form method="post" action="{{ route('user.password') }}" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @csrf

                                        <h6 class="heading-small text-muted mb-4">Alterar senha</h6>

                                        <div class="pl-lg-4">

                                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="complement">Senha</label>
                                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Senha" value="{{ old('password') }}" required >
                                                @include('admin.alerts.feedback', ['field' => 'password'])
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-default mt-4">Alterar senha</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>

                        @endif

                    </div>


                    @if(isset($user))
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img class="avatar-bg" src="{{URL::to('/files/users/'.$user->profile_pic)}}" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">

                                    <img class="avatar border-gray" style="margin:auto;" src="{{URL::to('/files/users/'.$user->profile_pic)}}">

                                    <h5 class="title">{{$user->name ?? '' }} {{$user->surname ?? '' }}</h5>
                                    <p class="description">
                                        {{ $user->email ?? '' }}
                                    </p>

                                    <button class="btn btn-danger btn-delete">apagar usuário</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

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
    </div>
    </div>

    <script>
        $(".avatar-bg").css("-webkit-filter", "blur(10px)");

        $(".btn-delete").click(function(event){
            event.stopPropagation();
            if(confirm("Tem certeza que deseja deletar este usuário? Esta operação não pode ser desfeita.")) {
                this.click;
                window.location.href = '/admin/user/delete/{{$user->id ?? ''}}';
            }
            event.preventDefault();

        });
    </script>
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
                    alert(base64data)
                    $modal.modal('hide');
                }
            });
        })
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
@endsection
