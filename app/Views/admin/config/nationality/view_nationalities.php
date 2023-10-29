<?php

use App\Models\Config\NationalityModel;

$model = new NationalityModel();
$data  = $model->findAll(); // SELECT * FROM nationality
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
  <li class="breadcrumb-item active" aria-current="page">Nacionalidades</li>
</ul>

<!-- TABLA -->
<main class="mx-auto" style="max-width: 40rem;">
  <header class="d-flex justify-content-between align-items-center">
    <h1>Nacionalidades</h1>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_modal">Crear Nacionalidad</button>
  </header>

  <section>
    <div class="table-responsive">
      <div class="table-wrapper">
        <table class="table table-hover" id="dataTable">
          <thead>
            <tr class="table-light">
              <th style="width: 5rem;">ID</th>
              <th style="width: 96px;">Código 1</th>
              <th style="width: 96px;">Código 2</th>
              <th style="width: 160px;">Nacionalidad</th>
              <th style="width: 5rem;">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($data as $row) : ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['alpha2'] ?></td>
                <td><?= $row['alpha3'] ?></td>
                <td><?= $row['name'] ?></td>
                <td class="d-flex gap-3">
                  <a href="<?= base_url('/a/configuracion/nacionalidad/editar/' . $row['id']) ?>" class="btn btn-outline-warning d-flex align-items-center justify-content-center" style="width: 2.5rem;">
                    <span class="material-symbols-rounded">
                      edit
                    </span>
                  </a>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#delete_modal" class="btn btn-outline-danger d-flex align-items-center justify-content-center" style="width: 2.5rem;">
                    <span class="material-symbols-rounded">
                      delete
                    </span>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

<!-- Modal Crear Nacionalidad -->
<div class="modal fade" id="create_modal" tabindex="-1">
  <form class="modal-dialog modal-dialog-scrollable" action="<?= base_url('/a/configuracion/nacionalidad/nuevo') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Agregar Nacionalidad</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="nationality_cod1" class="form-label">Código 1 <span class="text-danger">*</span></label>
          <input class="form-control" id="nationality_cod1" name="nationality_cod1" placeholder="Código Alpha 1" required>
        </div>
        <div class="mb-3">
          <label for="nationality_cod2" class="form-label">Código 2<span class="text-danger">*</span></label>
          <input class="form-control" id="nationality_cod2" name="nationality_cod2" placeholder="Código Alpha 2" required>
        </div>
        <div class="mb-3">
          <label for="nationality_name" class="form-label">Nacionalidad <span class="text-danger">*</span></label>
          <input class="form-control" id="nationality_name" name="nationality_name" placeholder="Nombre de la Nacionalidad" required>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </form>
</div>

<!-- Modal Eliminar Nacionalidad -->
<div class="modal fade" id="delete_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Eliminar Nacionalidad</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('/a/configuracion/nacionalidad/eliminar') ?>" method="post">
        <input type="hidden" name="id" value="0" /> <!-- No borrar -->
        <div class="modal-body">
          <p>¿Está seguro que desea eliminar este género?</p>
          <p class="text-secondary">Esta acción no se puede deshacer</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Alert con mensaje -->
<?php if (session('msg')) : ?>
  <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" style="width: fit-content; position: absolute; bottom: 3rem; left: 3rem;">
    <?= session('msg') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- Funcionalidad Delete -->
<script src="<?= base_url('/public/js/services/selectIdDelete.js') ?>"></script>
