@extends('admin.layouts.app', ['activePage' => 'service', 'title' => 'Yogha - Admin v1.0.0 - Prateleiras', 'navName' => 'Editar serviços', 'activeButton' => 'servicos'])

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
                                    <h3 class="mb-0">Prateleira</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('service.create') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">Informações da prateleira</h6>

                                @include('admin.alerts.success')
                                @include('admin.alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">


                                    <!-- -->

                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">Título</label>
                                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Título" value="{{ old('title') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'title'])
                                        </div>

                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="position">Preço</label>
                                            <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="Preço" value="{{ old('price') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'price'])
                                        </div>

                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="limit">Descrição</label>
                                            <textarea name="description" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required autofocus>
                                                {{ old('description') }}
                                            </textarea>
                                            @include('admin.alerts.feedback', ['field' => 'description'])
                                        </div>

                                        <div class="form-group{{ $errors->has('avantioServiceId') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="avantioServiceId">Serviço Avantio</label>
                                            <select name="avantioServiceId" class="form-control{{ $errors->has('avantioServiceId') ? ' is-invalid' : '' }}"  required autofocus>
                                                <?php foreach($avantioServices as $avantioService) {?>
                                                <option value="<?php echo $avantioService->id; ?>"><?php echo $avantioService->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'avantioServiceId'])
                                        </div>

                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label for="image">Imagem do serviço</label>
                                            <input type="file"  name="image" class="form-control-file">
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
