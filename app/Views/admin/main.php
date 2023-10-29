<?php

use App\Models\News\Post;

$model = new Post();
$data  = $model->findAll(); // SELECT * FROM post
?>

<style>
  .notices {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    padding: 1rem;
  }

  .card-notice {
    height: 8.2rem;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;
    overflow: hidden;
    padding: 1rem;
  }

  .card-notice:hover {
    background-color: #ddd3;
  }

  .shadow-card {
    position: absolute;
    bottom: 1px;
    left: 1rem;
    width: calc(100% - 2rem);
    height: 1rem;
    background: white;
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
  <li class="breadcrumb-item active" aria-current="page">Inicio</li>
</ul>

<main class="mx-5">
  <header class="d-flex justify-content-between align-items-center">
    <h1>Noticias</h1>
    <a href="<?= base_url('/a/noticia/nuevo') ?>" class="btn btn-success">Nuevo</a>
  </header>

  <!-- Listado de noticias -->
  <section class="notices">
    <?php foreach ($data as $post) : ?>
      <a href="<?= base_url('/a/noticia/'.$post['id']) ?>" class="d-block position-relative text-decoration-none">
        <div class="card">
          <div class="card-body card-notice">
            <h2 class="card-title h4"><?= $post['title'] ?></h2>
            <p class="card-text text-secondary" style="font-size: 0.9rem;"><?= $post['description'] ?></p>
          </div>
        </div>
        <div class="shadow-card"></div>
      </a>
    <?php endforeach; ?>
  </section>
</main>
