@extends('admin.layouts.app', ['activePage' => 'user', 'title' => 'Yogha - Admin v1.0.0 - Prateleiras', 'navName' => 'Editar prateleira', 'activeButton' => 'prateleiras'])

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
                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">Prateleira</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('shelf.create') }}" autocomplete="off"
                                enctype="multipart/form-data">
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



                                        <div class="form-group{{ $errors->has('position') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="position">Posição</label>
                                            <input type="number" name="position" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="Posição" value="{{ old('position') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'position'])
                                        </div>

                                        <div class="form-group{{ $errors->has('limit') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="limit">Quantidade de anúncios</label>
                                            <input type="number" name="limit" class="form-control{{ $errors->has('limit') ? ' is-invalid' : '' }}" placeholder="Quantidade de anúncios" value="{{ old('limit') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'limit'])
                                        </div>



                                        <div class="form-group{{ $errors->has('shelfLayoutId') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="shelfLayoutId">Layout da prateleira</label>
                                            <select name="shelfLayoutId" class="form-control{{ $errors->has('shelfLayoutId') ? ' is-invalid' : '' }}"  required autofocus>
                                                <?php foreach($layouts as $layout) {?>
                                                <option value="<?php echo $layout->id; ?>"><?php echo $layout->title; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'shelfLayoutId'])
                                        </div>



                                        <div class="form-group{{ $errors->has('shelfFilterId') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="shelfFilterId">Conteúdo da prateleira</label>
                                            <select name="shelfFilterId" class="form-control{{ $errors->has('shelfFilterId') ? ' is-invalid' : '' }}"  required autofocus>
                                                <?php foreach($filters as $filter) {?>
                                                <option value="<?php echo $filter->id; ?>"><?php echo $filter->title; ?></option>
                                                <?php } ?>
                                            </select>
                                            @include('admin.alerts.feedback', ['field' => 'shelfFilterId'])
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
