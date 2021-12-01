@extends('admin.layouts.app', ['activePage' => 'blog_cat', 'title' => 'Yogha - Admin v1.0.0 - Categoria', 'navName' => 'Categorias', 'activeButton' => 'categorias'])
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
                                    <h3 class="mb-0">Nova categoria</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('blog_cat.create') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4"></h6>

                                @include('admin.alerts.success')
                                @include('admin.alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">

                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">Título</label>
                                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Título" value="{{ old('title') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'title'])
                                        </div>

                                        <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="position">Slug</label>
                                            <input type="text" name="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="Slug" value="{{ old('slug') }}" required autofocus>
                                            @include('admin.alerts.feedback', ['field' => 'slug'])
                                        </div>

                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="limit">Descrição</label>
                                            <textarea id="wysiwyg" name="description" rows="55" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" autofocus>{{ old('description') }}</textarea>
                                            @include('admin.alerts.feedback', ['field' => 'description'])
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