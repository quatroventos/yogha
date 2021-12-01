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

</section>
