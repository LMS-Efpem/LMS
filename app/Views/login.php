<style>
  main {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-inline: 1rem;
  }

  h1 {
    text-align: center;
    padding-bottom: 2rem;
  }

  .logo {
    width: 50%;
    max-width: 300px;
    min-width: 100px;
    height: 50%;
    max-height: 300px;
    min-height: 100px;
    aspect-ratio: 1/1;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    width: 100%;
    max-width: 500px;
    min-width: 100px;
  }
</style>

<h1 style="grid-area: title;">Colegio Intelectual ABC</h1>

<main>
  <img class="logo" src="<?= base_url('/public/img/logo.png') ?>" alt="Logo de la institución">

  <form action="<?= base_url('/') ?>" method="post">
    <div>
      <label for="user" class="form-label">Usuario</label>
      <input type="text" id="user" name="user" class="form-control" placeholder="Ingrese su Usuario" autofocus required tabindex="1">
    </div>

    <div>
      <label for="pass" class="form-label">Contraseña</label>
      <input type="password" id="pass" name="pass" class="form-control" aria-describedby="forgotPass" placeholder="Ingrese se contraseña" required tabindex="2">
      <a href="<?= base_url('/recuperar') ?>" id="forgotPass" class="form-text text-decoration-none" tabindex="4">
        ¿Olvidaste tu contraseña?
      </a>
    </div>

    <button type="submit" class="btn btn-primary" tabindex="3">Ingresar</button>

  </form>
</main>

<aside>
  <?php if (!empty($msg)) : ?>
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" style="width: fit-content; position: absolute; bottom: 3rem; left: 3rem;">
    <span class="material-symbols-rounded bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
      warning
    </span>
    <?= $msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

</aside>
