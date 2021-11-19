@extends('layouts.app', ['activePage' => 'shelves', 'title' => 'Yogha - Admin v1.0.0 - Prateleiras', 'navName' => 'Prateleiras', 'activeButton' => 'prateleiras'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Prateleiras</h4>
                            <p class="card-category">Gerencie as prateleiras de conteúdo da página home</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Posição</th>
                                <th>Título</th>
                                <th>Limite de anúncios</th>
                                <th>Layout</th>
                                <th>Filtro</th>
                                </thead>
                                <tbody>
                                @foreach($shelves as $shelf)
                                <tr>
                                    <td>{{$shelf->id}}</td>
                                    <td>{{$shelf->position}}</td>
                                    <td>{{$shelf->title}}</td>
                                    <td>{{$shelf->limit}}</td>
                                    <td>{{$shelf->layoutTitle}}</td>
                                    <td>{{$shelf->filterTitle}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Opções</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('shelf.edit') }}" class="btn btn-warning">Adicionar <i class="nc-icon nc-simple-add"></i></a>
                            </div>
                        </div><!-- card -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
@endsection
