<?php

use App\Models\News\Post;

$model = new Post();
$news = $model->where('id', $id_new)->first(); // SELECT * FROM `post` WHERE `id` = $id_new LIMIT 1
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
            : base_url('/public/img/picture.svg')
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

<!-- Noticia -->
<main class="p-3">
  <header class="d-flex justify-content-between flex-wrap mb-4">
    <h1><?= $news['title'] ?></h1>
    <div>
      <a href="<?= base_url('/a/noticia/editar/' . $id_new) ?>" class="btn btn-secondary">Editar</a>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal">Eliminar</button>
    </div>
  </header>

  <?php $description_lines = explode("\n", $news['description']);
  foreach ($description_lines as $line) : ?>
    <p style='font-weight: 600; font-size: large;'><?= $line ?></p>
  <?php endforeach; ?>
</main>
<!-- Modal ELiminar noticia -->
<div class="modal fade " id="delete_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Eliminar Noticia</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro que desea eliminar esta noticia?</p>
        <p class="text-secondary">Esta acción no puede deshacerse.</p>
      </div>
      <div class="modal-footer">
        <form action="<?= base_url('/a/noticia/eliminar') ?>" method="post">
          <input type="hidden" name="id" value="<?= $id_new ?>" />
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </div>
</div>
