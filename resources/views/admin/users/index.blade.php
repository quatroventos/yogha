@extends('admin.layouts.app', ['activePage' => 'shelves', 'title' => 'Yogha - Admin v1.0.0 - Prateleiras', 'navName' => 'Prateleiras', 'activeButton' => 'prateleiras'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Usuários</h4>
                            <p class="card-category">Gerencie os usuários do sistema e do site</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Permissões</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}} {{$user->surname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roleTitle}}</td>
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
                                <a href="{{ route('user.edit') }}" class="btn btn-warning">Adicionar <i class="nc-icon nc-simple-add"></i></a>
                            </div>
                        </div><!-- card -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
@endsection
