<!doctype html>
<html lang="pt-BR">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="">
    <meta name="Keywords" content="">

    <!-- CANONICAL -->
    <link rel="canonical" href="http://www.yogha.com.br/">

    <!--TITLE -->
    <title>Yogha - Sinta-se em casa</title>

    <!-- BOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- ICONES -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- STYLE -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">

    <!-- RESPONSIVE -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DATE RANGE -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- GOOGLE MAPS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSeQcKPvoa7ix-NIn8yf_gRlBqv4QtaYI&v=weekly&channel=2" ></script>

</head>

<body id="editar-perfil">

    <section>
      <div class="container">

        <div class="row mb-15 align-items-center">
          <div class="col px-0 grow-0">
            <a href="index.shtml" class="btn btn-2 btn-ico"><i class="uil uil-angle-left"></i></a>
          </div>
          <div class="col ps-0">
            <h2 class="texto-g texto-ret"><strong>João Silveira Santos</strong></h2>
          </div>
        </div>


          <!-- form original -->

          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="card card-plain">
                  <div class="content">
                      <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                      </div>

                      <div class="form-group">   {{-- is-invalid make border red --}}
                          <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" class="form-control" required>
                      </div>

                      <div class="form-group">
                          <input type="password" name="password" class="form-control" required >
                      </div>
                      <div class="form-group">
                          <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="form-control" required autofocus>
                      </div>
                      <div class="form-group d-flex justify-content-center">
                          <div class="form-check rounded col-md-10 text-left">
                              <label class="form-check-label text-white d-flex align-items-center">
                                  <input class="form-check-input" name="agree" type="checkbox" required >
                                  <span class="form-check-sign"></span>
                                  <b>{{ __('Agree with terms and conditions') }}</b>
                              </label>
                          </div>
                      </div>

                      <div class="footer text-center">
                          <button type="submit" class="btn btn-fill btn-neutral btn-wd">{{ __('Create Free Account') }}</button>
                      </div>
                  </div>
              </div>
          </form>

          <div class="col">
              @foreach ($errors->all() as $error)
              <div class="alert alert-warning alert-dismissible fade show" >
                  <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                  {{ $error }}
              </div>
              @endforeach
          </div>

          <!-- form original -->



          <form>


          <div class="row justify-content-center">
            <div class="col col-sm-6">
              <picture class="pic-p mx-auto" style="background-image: url(img/foto-usuario.png);"></picture>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col col-sm-6">
              <div class="form-group form-inline justify-content-center gap-0">
                <a href="#!" class="btn btn-p btn-link"><strong>Alterar foto</strong></a>
                <a href="#!" class="btn btn-p btn-link"><strong>Excluir foto</strong></a>
              </div>
            </div>
          </div>

          <hr class="mb-30">

          <div class="row justify-content-center mb-15">
            <div class="col col-sm-6">
              <h3><strong>Dados pessoais</strong></h3>
            </div>
          </div>
          <div class="row justify-content-center mb-15">
            <div class="col col-sm-6">
              <div class="row">
                <div class="form-group col-12 col-sm-6">
                  <label class="texto-m mb-5" for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="form-group col-12 col-sm-6">
                  <label class="texto-m mb-5" for="sobrenome">Sobrenome</label>
                  <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                </div>
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="E-mail">
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" placeholder="Telefone">
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="data-nasc">Data de nascimento</label>
                <input type="date" class="form-control" id="data-nasc" placeholder="dd/mm/aaaa">
              </div>
            </div>
          </div>

          <hr class="mb-30">

          <div class="row justify-content-center mb-15">
            <div class="col col-sm-6 mb-15">
              <h3><strong>Localização</strong></h3>
            </div>
          </div>
          <div class="row justify-content-center mb-15">
            <div class="col col-sm-6">
              <div class="form-group">
                <label class="texto-m mb-5" for="pais">País</label>
                <input type="text" class="form-control" id="pais" placeholder="">
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" placeholder="">
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" placeholder="">
              </div>
            </div>
          </div>

          <hr class="mb-30">

          <div class="row justify-content-center mb-15">
            <div class="col col-sm-6">
              <h3><strong>Senha</strong></h3>
            </div>
          </div>
          <div class="row justify-content-center mb-30">
            <div class="col col-sm-6">
{{--              <div class="form-group">--}}
{{--                <label class="texto-m mb-5" for="pais">Senha antiga</label>--}}
{{--                <input type="password" class="form-control" id="pais" placeholder="">--}}
{{--              </div>--}}
              <div class="form-group">
                <label class="texto-m mb-5" for="estado">Nova senha</label>
                <input type="password" class="form-control" id="estado" placeholder="">
              </div>
              <div class="form-group">
                <label class="texto-m mb-5" for="cidade">Repita a senha</label>
                <input type="password" class="form-control" id="cidade" placeholder="">
              </div>
              <div>
                <p class="texto-m mb-0">A senha deve ter pelo menos:</p>
                <p class="texto-m mb-0">1 letra maiúscula</p>
                <p class="texto-m mb-0">1 número</p>
                <p class="texto-m mb-0">1 caractere especial (@, $,%,!, &, etc)</p>
              </div>
            </div>
          </div>

          <div class="row justify-content-center mb-15">
            <div class="col col-sm-5">
              <button type="submit" class="btn d-flex">Salvar</button>
            </div>
          </div>

        </form>
      </div>
    </section>

</body>

</html>
