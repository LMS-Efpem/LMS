<?php

use App\Models\News\Post;

$model   = new Post();
$notice  = $model->where('id', $id_new)->first(); // SELECT * FROM `post` WHERE `id` = $id_new LIMIT 1
?>

<style>
  main {
    margin-inline: auto;
    width: 100%;
    max-width: 50rem;
  }
</style>
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

<!-- Formulario editar registro -->
<main class="p-3">
  <form action="<?= base_url('/a/noticia/editar') ?>" method="post">
    <input type="hidden" name="id" value="<?= $id_new ?>" />
    <header class="d-flex justify-content-between align-items-center flex-wrap pb-5">
      <input type="text" class="form-control fs-4 w-50" name="txt_title" placeholder="Título de la noticia" value="<?= $notice['title'] ?>" required tabindex="1" autofocus>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar Cambios</button>
        <a href="<?= base_url('/a/noticia/' . $id_new) ?>" class="btn btn-secondary" tabindex="4">Descartar</a>
      </div>
    </header>

    <section>
      <textarea id="content-description" name="txt_description" class="form-control" placeholder="Escriba aquí el cuerpo de la noticia..." value="<?= $notice['description'] ?>" required style="height: max(40vh, 10rem);" tabindex="2"></textarea>
    </section>
  </form>
</main>

<!-- Contenido de Textarea -->
<script>
  // Selecciona el primer elemento 'textarea' y le asigna el string del contenido de la noticia
  document.getElementsByTagName('textarea')[0].value = `<?= $notice['description'] ?>`;
</script>
