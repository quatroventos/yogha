<section class="aba collapse" id="aba-usuario">

  <!-- usuario login -->
  <div class="container fundo-branco pt-15 h-100">
    <div class="row mb-10 align-items-center">
      <div class="col px-0 grow-0">
        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico switch"><i class="uil uil-angle-left"></i></a>
      </div>
      <div class="col ps-0">
        <h2 class="texto-g"><strong></strong></h2>
      </div>
    </div>
    <div class="row align-items-center justify-content-center mb-30 h-100">
      <div class="col col-sm-6">
        <img class="img-g mb-15 mx-auto" src="img/logo-yogha.svg">
        <h2 class="text-center mb-10"><strong>Estamos felizes em ter você aqui!</strong></h2>
        <h3 class="text-center mb-15">Entre e aproveite todos os recursos que preparamos para você.</h3>
          <form class="form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="E-mail">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
              @enderror
          </div>
          <div class="form-group form-inline merge">
            <input type="password" class="form-control d-flex senha" id="senha" placeholder="••••••••">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
              @enderror
            <a href="#!" class="btn btn-4 btn-ico mostrar-senha"><i class="uil uil-eye-slash"></i></a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn d-flex">Entrar</button>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-4 d-flex">Cadastrar</button>
          </div>
          <div class="form-group form-check">
            <a href={{ route('password.request') }}" class="btn-link btn-p px-0"><strong>Esqueci a senha</strong></a>
            <input type="checkbox" class="form-check-input" id="lembrar">
            <label class="form-check-label" for="lembrar">Lembre de mim</label>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- usuario resetar senha -->
  <!--<div class="container fundo-branco pt-15 h-100">
    <div class="row mb-10 align-items-center">
      <div class="col px-0 grow-0">
        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico switch"><i class="uil uil-angle-left"></i></a>
      </div>
      <div class="col ps-0">
        <h2 class="texto-g"><strong></strong></h2>
      </div>
    </div>
    <div class="row align-items-center justify-content-center mb-30 h-100">
      <div class="col col-sm-6">
        <h2 class="text-center mb-10"><strong>Problemas para entrar?</strong></h2>
        <h3 class="text-center mb-15">Insira o seu email e enviaremos um link para você voltar a acessar a sua conta.</h3>
        <form>
          <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="E-mail">
          </div>
          <div class="form-group">
            <button type="submit" class="btn d-flex">Enviar</button>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-link d-flex">Criar conta</button>
          </div>
        </form>
      </div>
    </div>
  </div>-->

  <!-- usuario logado novo -->
  <!--<div class="container fundo-branco pt-15 h-100">
    <div class="row mb-15 align-items-center">
      <div class="col px-0 grow-0">
        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
      </div>
      <div class="col ps-0">
        <h2 class="texto-g texto-ret"><strong>João Silveira Santos</strong></h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3 perfil">

        <div class="row">
          <div class="col col-sm-12 mb-15 pe-0 grow-0">
            <picture class="pic-p mx-auto" style="background-image: url(img/fundo-usuario.jpg);"></picture>
          </div>
          <div class="col col-sm-12 mb-15 justify-content-center">
            <div class="row mx-0 text-center">
              <div class="col px-0">
                <h3><strong>0</strong></h3>
                <p class="texto-p mb-0">Viagens</p>
              </div>
              <div class="col px-0">
                <h3><strong>0</strong></h3>
                <p class="texto-p mb-0">Reservas</p>
              </div>
              <div class="col px-0">
                <h3><strong>0</strong></h3>
                <p class="texto-p mb-0">Avaliações</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-sm-12">
            <div class="form-group form-inline">
              <a href="pagina-editar-perfil.shtml" class="btn btn-p">Editar perfil</a>
              <a href="#!" class="btn btn-p btn-3">Desconectar</a>
            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-sm-9">

        <hr class="d-sm-none">

        <div class="row mb-10">
          <div class="col">
            <h3><strong>Meu planejamento</strong></h3>
          </div>
        </div>
        <div class="row mb-15">
          <div class="col">
            <p>Vai viajar em breve? Reserve sua estadia com antecedência e deixe o resto com a gente.</p>
            <a href="#!"  data-bs-toggle="collapse" data-bs-target="#aba-usuario, #aba-busca" class="btn btn-p me-auto">Começe a explorar</a>
          </div>
        </div>
        <hr>
        <div class="row mb-10">
          <div class="col">
            <h3><strong>Reservas anteriores</strong></h3>
          </div>
        </div>
        <div class="row mb-15">
          <div class="col">
            <p>Seu histórico aparecerá por aqui, fique a vontade para reservar novamente.</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3 class="mb-5"><strong>Não encontra sua reserva?</strong></h3>
            <a href="#!" data-bs-toggle="collapse" data-bs-target=".localizador" class="btn-link btn-p px-0"><strong>Procure pelo localizador</strong></a>
          </div>
        </div>
        <div class="row localizador collapse">
          <div class="col">
            <form>
              <div class="form-group">
                <input class="d-flex" type="text" name="" placeholder="Insira o localizador">
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div> -->


  <!-- usuario logado -->
  <div class="container fundo-branco pt-15 h-100">
    <div class="row mb-15 align-items-center">
      <div class="col px-0 grow-0">
        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
      </div>
      <div class="col ps-0">
        <h2 class="texto-g texto-ret"><strong>João Silveira Santos</strong></h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3 perfil">

        <div class="row">
          <div class="col col-sm-12 mb-15 pe-0 grow-0">
            <picture class="pic-p mx-auto" style="background-image: url(img/foto-usuario.png);"></picture>
          </div>
          <div class="col col-sm-12 mb-15 justify-content-center">
            <div class="row mx-0 text-center">
              <div class="col px-0">
                <h3><strong>99</strong></h3>
                <p class="texto-p mb-0">Viagens</p>
              </div>
              <div class="col px-0">
                <h3><strong>99</strong></h3>
                <p class="texto-p mb-0">Reservas</p>
              </div>
              <div class="col px-0">
                <h3><strong>99</strong></h3>
                <p class="texto-p mb-0">Avaliações</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-sm-12">
            <div class="form-group form-inline">
              <a href="pagina-editar-perfil.shtml" class="btn btn-p">Editar perfil</a>
              <a href="#!" class="btn btn-p btn-3">Desconectar</a>
            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-sm-9">

        <hr class="d-sm-none">

        <div class="row mb-10">
          <div class="col">
            <h3><strong>Meu planejamento</strong></h3>
          </div>
        </div>
        <div class="row mb-15">
          <div class="col">
            <div class="slider slide-var texto-marrom-escuro">
              <ul class="gap-15">
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mb-10">
          <div class="col">
            <h3><strong>Reservas anteriores</strong></h3>
          </div>
        </div>
        <div class="row mb-15">
          <div class="col">
            <div class="slider slide-var texto-marrom-escuro">
              <ul class="gap-15">
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
                <li class="d-flex gap-10">
                  <a href="pagina-single-anuncio.shtml">
                    <picture class="pic-p" style="background-image: url(img/fundo-imagem.jpg);"></picture>
                  </a>
                  <div class="">
                    <a href="pagina-single-anuncio.shtml">
                      <h3 class="mb-5">Título do anúncio</h3>
                      <h4 class="texto-m mb-5">Local</h4>
                      <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3 class="mb-5"><strong>Não encontra sua reserva?</strong></h3>
            <a href="#!" data-bs-toggle="collapse" data-bs-target=".localizador" class="btn-link btn-p px-0"><strong>Procure pelo localizador</strong></a>
          </div>
        </div>
        <div class="row localizador collapse">
          <div class="col">
            <form>
              <div class="form-group">
                <input class="d-flex" type="text" name="" placeholder="Insira o localizador">
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>

</section>
