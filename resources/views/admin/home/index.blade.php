@extends('admin.layouts.app', ['activePage' => 'home', 'title' => 'Yogha - Admin v1.0.0 - Home', 'navName' => 'Home', 'activeButton' => 'home'])

@section('content')
    @if(\Session::get('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <form method="post" action="{{ route('admin.home.update') }}" autocomplete="off" enctype="multipart/form-data">
                    @include('admin.alerts.success')
                    @include('admin.alerts.error_self_update', ['key' => 'not_allow_profile'])
                    @csrf
                    <div class="row">

                        <!-- header -->
                        <div class="card col-md-12">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h3 class="mb-0">Header</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">Imagem do cabeçalho</h6>
                                <div class="pl-lg-4">

                                    <img src="{{'/uploads/'.$data['headerimage']}}" style="max-height: 150px;">
                                    <input type="hidden" name="oldheaderimage" value="{{$data['headerimage']}}">
                                    <hr>
                                    <div class="form-group{{ $errors->has('headerimage') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Hero</label>
                                        <input type="file" name="headerimage" class="form-control" >
                                        @include('admin.alerts.feedback', ['field' => 'headerimage'])
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- header -->

                        <!-- header -->
                        <div class="card col-md-12">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h3 class="mb-0">Banner</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4"></h6>
                                <div class="pl-lg-4">

                                    <img src="{{'/uploads/'.$data['banner_image']}}" style="max-height: 150px;">
                                    <input type="hidden" name="oldbanner_image" value="{{$data['banner_image']}}">
                                    <hr>

                                    <div class="form-group{{ $errors->has('banner_image') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="banner_image">Imagem</label>
                                        <input type="file" name="banner_image" class="form-control" >
                                        @include('admin.alerts.feedback', ['field' => 'banner_image'])
                                    </div>
                                    <div class="form-group{{ $errors->has('banner_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="banner_title">Título</label>
                                        <input type="text" name="banner_title" class="form-control" required  value="{{$data['banner_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'banner_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('banner_text') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="banner_text">Texto</label>
                                        <input type="text" name="banner_text" class="form-control" required  value="{{$data['banner_text']}}">
                                        @include('admin.alerts.feedback', ['field' => 'banner_text'])
                                    </div>
                                    <div class="form-group{{ $errors->has('banner_link') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="banner_link">Link do botão</label>
                                        <input type="text" name="banner_link" class="form-control" required  value="{{$data['banner_link']}}">
                                        @include('admin.alerts.feedback', ['field' => 'banner_link'])
                                    </div>
                                    <div class="form-group{{ $errors->has('banner_cta') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="banner_cta">Texto do botão</label>
                                        <input type="text" name="banner_cta" class="form-control" required n value="{{$data['banner_cta']}}">
                                        @include('admin.alerts.feedback', ['field' => 'banner_cta'])
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- header -->

                        <!-- sessoes -->
                        <div class="card col-md-12">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h3 class="mb-0">Sessões</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">Primeira Sessão</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('shelf1_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Título</label>
                                        <input type="text" name="shelf1_title" class="form-control"  value="{{$data['shelf1_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'shelf1_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('shelf1_content') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Conteúdo</label>
                                        <select name="shelf1_content" class="form-control">
                                            <option {{($data['shelf1_content'] == 1 ? 'selected' : '')}} value="1">Mais acessados</option>
                                            <option {{($data['shelf1_content'] == 2 ? 'selected' : '')}} value="2">Mapa</option>
                                            <option {{($data['shelf1_content'] == 3 ? 'selected' : '')}} value="3">Descontos</option>
                                            <option {{($data['shelf1_content'] == 4 ? 'selected' : '')}} value="4">Banner</option>
                                            <option {{($data['shelf1_content'] == 5 ? 'selected' : '')}} value="5">Bairros</option>
                                        </select>
                                        @include('admin.alerts.feedback', ['field' => 'shelf1_content'])
                                    </div>
                                </div>
                                <hr>
                                <h6 class="heading-small text-muted mb-4">Segunda Sessão</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('shelf2_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Título</label>
                                        <input type="text" name="shelf2_title" class="form-control"  value="{{$data['shelf2_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'shelf2_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('shelf2_content') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Conteúdo</label>
                                        <select name="shelf2_content" class="form-control">
                                            <option {{($data['shelf2_content'] == 1 ? 'selected' : '')}} value="1">Mais acessados</option>
                                            <option {{($data['shelf2_content'] == 2 ? 'selected' : '')}} value="2">Mapa</option>
                                            <option {{($data['shelf2_content'] == 3 ? 'selected' : '')}} value="3">Descontos</option>
                                            <option {{($data['shelf2_content'] == 4 ? 'selected' : '')}} value="4">Banner</option>
                                            <option {{($data['shelf2_content'] == 5 ? 'selected' : '')}} value="5">Bairros</option>
                                        </select>
                                        @include('admin.alerts.feedback', ['field' => 'shelf2_content'])
                                    </div>
                                </div>
                                <hr>
                                <h6 class="heading-small text-muted mb-4">Terceira Sessão</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('shelf3_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Título</label>
                                        <input type="text" name="shelf3_title" class="form-control"  value="{{$data['shelf3_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'shelf3_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('shelf3_content') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Conteúdo</label>
                                        <select name="shelf3_content" class="form-control">
                                            <option {{($data['shelf3_content'] == 1 ? 'selected' : '')}} value="1">Mais acessados</option>
                                            <option {{($data['shelf3_content'] == 2 ? 'selected' : '')}} value="2">Mapa</option>
                                            <option {{($data['shelf3_content'] == 3 ? 'selected' : '')}} value="3">Descontos</option>
                                            <option {{($data['shelf3_content'] == 4 ? 'selected' : '')}} value="4">Banner</option>
                                            <option {{($data['shelf3_content'] == 5 ? 'selected' : '')}} value="5">Bairros</option>
                                        </select>
                                        @include('admin.alerts.feedback', ['field' => 'shelf3_content'])
                                    </div>
                                </div>
                                <hr>
                                <h6 class="heading-small text-muted mb-4">Quarta Sessão</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('shelf4_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Título</label>
                                        <input type="text" name="shelf4_title" class="form-control"  value="{{$data['shelf4_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'shelf4_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('shelf4_content') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Conteúdo</label>
                                        <select name="shelf4_content" class="form-control">
                                            <option {{($data['shelf4_content'] == 1 ? 'selected' : '')}} value="1">Mais acessados</option>
                                            <option {{($data['shelf4_content'] == 2 ? 'selected' : '')}} value="2">Mapa</option>
                                            <option {{($data['shelf4_content'] == 3 ? 'selected' : '')}} value="3">Descontos</option>
                                            <option {{($data['shelf4_content'] == 4 ? 'selected' : '')}} value="4">Banner</option>
                                            <option {{($data['shelf4_content'] == 5 ? 'selected' : '')}} value="5">Bairros</option>
                                        </select>
                                        @include('admin.alerts.feedback', ['field' => 'shelf4_content'])
                                    </div>
                                </div>
                                <hr>
                                <h6 class="heading-small text-muted mb-4">Quinta Sessão</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('shelf5_title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Título</label>
                                        <input type="text" name="shelf5_title" class="form-control"  value="{{$data['shelf5_title']}}">
                                        @include('admin.alerts.feedback', ['field' => 'shelf5_title'])
                                    </div>
                                    <div class="form-group{{ $errors->has('shelf5_content') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">Conteúdo</label>
                                        <select name="shelf5_content" class="form-control">
                                            <option {{($data['shelf5_content'] == 1 ? 'selected' : '')}} value="1">Mais acessados</option>
                                            <option {{($data['shelf5_content'] == 2 ? 'selected' : '')}} value="2">Mapa</option>
                                            <option {{($data['shelf5_content'] == 3 ? 'selected' : '')}} value="3">Descontos</option>
                                            <option {{($data['shelf5_content'] == 4 ? 'selected' : '')}} value="4">Banner</option>
                                            <option {{($data['shelf5_content'] == 5 ? 'selected' : '')}} value="5">Bairros</option>
                                        </select>
                                        @include('admin.alerts.feedback', ['field' => 'shelf5_content'])
                                    </div>
                                </div>

                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-default mt-4">Salvar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- sessoes -->

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
