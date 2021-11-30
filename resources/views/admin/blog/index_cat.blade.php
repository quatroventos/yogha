@extends('admin.layouts.app', ['activePage' => 'blog_cat', 'title' => 'Yogha - Admin v1.0.0 - Categoria', 'navName' => 'Categorias', 'activeButton' => 'categorias'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Categorias</h4>
                            <p class="card-category">Categorias do blog</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Título</th>
                                </thead>
                                <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->title}}</td>
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
                                <a href="{{ route('blog_cat.edit') }}" class="btn btn-warning">Adicionar <i class="nc-icon nc-simple-add"></i></a>
                            </div>
                        </div><!-- card -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
@endsection
