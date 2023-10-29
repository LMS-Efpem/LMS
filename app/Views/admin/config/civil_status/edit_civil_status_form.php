<?php

use App\Models\Config\CivilStatusModel;

$model = new CivilStatusModel();
$status  = $model->find($id);
?>

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
          <a href="<?= base_url('/a/configuracion') ?>" class="nav-link active">
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
  <li class="breadcrumb-item">
    <a href="<?= base_url('/a/configuracion') ?>">Configuración</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Estados Civiles</li>
</ul>

<!-- FORMULARIO DE EDICIÓN -->
<header class="m-5">
  <h1>Estados Civiles</h1>
</header>

<main class="m-auto" style="max-width: min(100%, 500px);">
  <form action="<?= base_url('/a/configuracion/estado-civil/editar') ?>" method="post">
    <input type="hidden" name="id" value="<?= $status['id'] ?>">
    <div class="my-3">
      <label for="civil_status" class="form-label">Nombre del Estado Civil <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="civil_status" name="civil_status" value="<?= $status['description'] ?>" required>
    </div>
    <div>
      <button type="submit" class="btn btn-warning">Guardar Cambios</button>
      <a href="<?= base_url('/a/configuracion/estado-civil/') ?>" class="btn btn-secondary">Descartar</a>
    </div>
  </form>
</main>
