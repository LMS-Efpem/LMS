<!-- NAVBAR -->
<nav class="navbar fixed-top navbar-expand bg-body-secondary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <a href="<?= base_url('a/inicio') ?>" class="navbar-brand">
        <img class="d-inline-block align-top" src="<?= base_url('/public/img/logo.png') ?>" width="42" height="42" alt="Logo" />
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?= base_url('/a/perfiles/') ?>" class="nav-link">
            Perfil
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/a/notas/') ?>" class="nav-link">
            Calificaciones
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/a/carga-academica/') ?>" class="nav-link">
            Carga Académica
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/a/configuracion') ?>" class="nav-link">
            Configuración
          </a>
        </li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="
          <?= (session('picture'))
            ? base_url('/public/img/profile/' . session('role') . '/' . session('id') . '.png')
            : base_url('/public/img/picture.png')
          ?>" alt="Perfil" width="42" height="42">
      </button>
      <ul class="dropdown-menu dropdown-menu-end mt-3">
        <li class="mx-3">
          <span class="d-block text-secondary">Usuario:</span>
          <span class="d-block px-3"><?= session('username') ?></span>
        </li>
        <li class="mx-3">
          <span class="d-block text-secondary">Nombres:</span>
          <span class="d-block px-3"><?= session('name') ?></span>
        </li>
        <li class="mx-3">
          <span class="d-block text-secondary">Apellidos:</span>
          <span class="d-block px-3"><?= session('lastname') ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="d-flex">
          <a href="<?= base_url('/a/perfil/administrador/' . session('id')) ?>" class="d-flex align-items-center btn btn-outline-secondary mx-2">
            <span class="material-symbols-rounded">
              visibility
            </span>
          </a>
          <a href="<?= base_url('/logout') ?>" class="btn btn-primary text-nowrap me-2">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- BREADCRUMB -->
<ul class="breadcrumb ms-5">
  <li class="breadcrumb-item">
    <a href="<?= base_url('/a/inicio') ?>">Inicio</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Noticia</li>
</ul>

<!-- Formulario crear registro -->
<main class="mx-5">
  <form method="post">
    <header class="d-flex justify-content-between align-items-center pb-5">
      <input type="text" class="form-control fs-4 w-50" name="txt_title" placeholder="Título de la noticia" required tabindex="1" autofocus>
      <div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#publish_modal" tabindex="3">Publicar</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#discard_modal" tabindex="4">Descartar</button>
      </div>
    </header>

    <section>
      <textarea name="txt_description" class="form-control" placeholder="Escriba aquí el cuerpo de la noticia..." required style="height: max(40vh, 10rem);" tabindex="2"></textarea>
    </section>

    <!-- Modal Publicar noticia -->
    <div class="modal fade " id="publish_modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title h5">Publicar Noticia</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Está seguro que desea publicar esta noticia?</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Publicar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>

<!-- Modal Descarta cambios -->
<div class="modal fade " id="discard_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Descartar Cambios</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Si sales de esta página los cambios que hayas hecho no se guardarán.</p>
        <p class="text-secondary">¿Seguro que quieres irte?</p>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('/a/inicio') ?>" class="btn btn-warning">Sí</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
