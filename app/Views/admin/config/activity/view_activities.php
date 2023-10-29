<?php

use App\Models\Config\ActivityModel;

$model = new ActivityModel();
$data  = $model->findAll(); // SELECT * FROM ACTIVITY
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
          <a href="<?= base_url('/a/configuracion ') ?>" class="nav-link active">
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
  <li class="breadcrumb-item">
    <a href="<?= base_url('/a/configuracion') ?>">Configuración</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Actividades</li>
</ul>

<!-- TABLA -->
<main class="mx-auto" style="max-width: 60rem;">
  <header class="d-flex justify-content-between align-items-center">
    <h1>Actividades</h1>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_modal">Crear Actividad</button>
  </header>

  <section>
    <div class="table-responsive">
      <div class="table-wrapper">
        <table class="table table-hover" id="dataTable">
          <thead>
            <tr class="table-light">
              <th style="width: 5rem;">ID</th>
              <th>Actividad</th>
              <th>Descripcion</th>
              <th>Numero de Actividad</th>
              <th>Asignatura de grado</th>
              <th>Unidad</th>
              <th style="width: 5rem;">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($data as $row) : ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['id_activity_type'] ?></td>
                <td><?= $row['id_subject_grade'] ?></td>
                <td><?= $row['id_unit'] ?></td>
                <td class="d-flex gap-3">
                  <a href="<?= base_url('/a/configuracion/actividades/editar/' . $row['id']) ?>" class="btn btn-outline-warning d-flex align-items-center justify-content-center" style="width: 2.5rem;">
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

<!-- Modal Crear actividad -->
<div class="modal fade" id="create_modal" tabindex="-1">
  <form class="modal-dialog modal-dialog-scrollable" action="<?= base_url('/a/configuracion/actividades/nuevo') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Agregar Actividad</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="activity_name" class="form-label">Actividad <span class="text-danger">*</span></label>
          <input class="form-control" id="activity_name" name="activity_name" placeholder="Nombre de la actividad" required>
        </div>
        <div class="mb-3">
          <label for="activity_description" class="form-label">Descripcion <span class="text-danger">*</span></label>
          <input class="form-control" id="acitivity_description" name="activity_description" placeholder="Descripción de la actividad" required>
        </div>
        <div class="mb-3">
          <label for="activity_num" class="form-label">Numero de Actividad <span class="text-danger">*</span></label>
          <input class="form-control" id="acitivity_num" name="activity_num" placeholder="Numero de actividad" required>
        </div>
        <div class="mb-3">
          <label for="activity_asig" class="form-label">Asignatura de Grado<span class="text-danger">*</span></label>
          <input class="form-control" id="activity_asig" name="activity_asig" placeholder="Asignatura de grado" required>
        </div>
        <div class="mb-3">
          <label for="activity_unia" class="form-label">Unidad <span class="text-danger">*</span></label>
          <input class="form-control" id="acitivity_unia" name="activity_unia" placeholder="Unidad de la actividad" required>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </form>
</div>

<!-- Modal Eliminar actividad -->
<div class="modal fade" id="delete_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title h5">Eliminar Actividad</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('/a/configuracion/actividades/eliminar') ?>" method="post">
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
