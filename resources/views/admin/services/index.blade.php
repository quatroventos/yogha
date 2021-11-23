@extends('admin.layouts.app', ['activePage' => 'services', 'title' => 'Yogha - Admin v1.0.0 - Serviços', 'navName' => 'Serviços', 'activeButton' => 'servicos'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Serviços</h4>
                            <p class="card-category">Gerencie os serviços adicionais</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Imagem</th>
                                <th>Título</th>
                                <th>Preço</th>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td><img src="{{URL::to('/')}}/files/services/{{$service->image}}" width="80"></td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->price}}</td>
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
                                <a href="{{ route('service.edit') }}" class="btn btn-warning">Adicionar <i class="nc-icon nc-simple-add"></i></a>
                            </div>
                        </div><!-- card -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
@endsection
