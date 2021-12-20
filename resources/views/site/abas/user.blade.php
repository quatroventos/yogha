<section class="aba collapse" id="aba-usuario">
  <!-- usuario logado -->
  <div class="container fundo-branco pt-15 h-100">
    <div class="row mb-15 align-items-center">
      <div class="col px-0 grow-0">
        <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
      </div>
      <div class="col ps-0">
        <h2 class="texto-g texto-ret"><strong>{{$user->name ?? ''}} {{$user->surname ?? ''}}</strong></h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3 perfil">

        <div class="row">
          <div class="col col-sm-12 mb-15 pe-0 grow-0">
            <picture class="pic-p mx-auto" style="background-image: url(/files/users/{{$user->profile_pic ?? ''}});"></picture>
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

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn btn-p btn-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Desconectar</a>
                </form>


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

                  @foreach($userreservations as $accommodation)
                      <?php
                          $pictures = json_decode($accommodation->Pictures, true);
                          if(isset($pictures['Picture'][0]['PreparedURI'])){
                            $thumbnail = $pictures['Picture'][0]['ThumbnailURI'];
                          }
                      ?>

                          <li>
                              <a href="accommodation/<?php echo $accommodation->AccommodationId; ?>" class="texto-marrom-escuro">
                                  <?php if(isset($pictures['Picture'][0]['OriginalURI'])){ ?>
                                  <picture class="mb-10" style="background-image: url(<?php echo $pictures['Picture'][0]['OriginalURI']; ?>);"></picture>
                                  <?php } ?>
                                  <h3 class="mb-5"><?php echo $accommodation->AccommodationName; ?></h3>
                                  <h4 class="texto-m d-flex gap-5"><strong class="texto-laranja">R${{$accommodation->District}}</strong>/noite</h4>
                                  <h4 class="texto-p d-flex gap-5"><i class="icone-p texto-laranja uil uil-calender"></i> 8/10 → 9/10</h4>
                              </a>
                          </li>

                  @endforeach

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
