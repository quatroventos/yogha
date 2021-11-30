@extends('admin.layouts.app', ['activePage' => 'blog', 'title' => 'Yogha - Admin v1.0.0 - Posts do blog', 'navName' => 'Blog', 'activeButton' => 'blog'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Posts</h4>
                            <p class="card-category">Gerencie os posts do blog</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Imagem</th>
                                <th>Título</th>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><img src="{{URL::to('/')}}/files/blog_posts/{{$post->image}}" width="80"></td>
                                    <td><a href="{{URL::to('/')}}/admin/blog_edit/{{$post->id}}">{{$post->title}}</a></td>
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
                                <a href="{{ route('blog.edit') }}" class="btn btn-warning">Adicionar <i class="nc-icon nc-simple-add"></i></a>
                            </div>
                        </div><!-- card -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
@endsection
