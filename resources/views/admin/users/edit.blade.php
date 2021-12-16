@extends('admin.layouts.app', ['activePage' => 'user', 'title' => 'Yogha - Admin v1.0.0 - Prateleiras', 'navName' => 'Editar prateleira', 'activeButton' => 'prateleiras'])

@section('content')
    <div class="alert-success">
        {!! \Session::get('success') !!}
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">Usuário</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.create') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">Informações da prateleira</h6>

                                @include('admin.alerts.success')
                                @include('admin.alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">


                                    <!-- -->

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="name">Nome</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('name') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="surname">Sobrenome</label>
                                            <input type="text" name="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="Sobrenome" value="{{ old('surname') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'surname'])
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="phone">Telefone</label>
                                            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Telefone" value="{{ old('phone') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'phone'])
                                        </div>

                                        <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="cpf">CPF</label>
                                            <input type="text" name="cpf" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="CPF" value="{{ old('cpf') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'cpf'])
                                        </div>

                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="country">País</label>
                                            <input type="text" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="País" value="{{ old('country') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'country'])
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="city">Cidade</label>
                                            <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="Cidade" value="{{ old('city') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'city'])
                                        </div>

                                        <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="district">Bairro</label>
                                            <input type="text" name="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" placeholder="Bairro" value="{{ old('district') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'district'])
                                        </div>

                                        <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="zip_code">CEP</label>
                                            <input type="text" name="zip_code" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" placeholder="CEP" value="{{ old('zip_code') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'zip_code'])
                                        </div>

                                        <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="street">Rua</label>
                                            <input type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="Rua" value="{{ old('street') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'street'])
                                        </div>

                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="number">Número</label>
                                            <input type="text" name="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="Número" value="{{ old('number') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'number'])
                                        </div>

                                        <div class="form-group{{ $errors->has('complement') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="complement">Complemento</label>
                                            <input type="text" name="complement" class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}" placeholder="Complemento" value="{{ old('complement') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'complement'])
                                        </div>

                                        <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="role_id">Permissões</label>
                                            <select name="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}"  required autofocus>
                                                <?php foreach($roles as $role) {?>
                                                <option value="<?php echo $role->id; ?>"><?php echo $role->title; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'role_id'])
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-default mt-4">Salvar</button>
                                        </div>

                                    <!-- -->
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
