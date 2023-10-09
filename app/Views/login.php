<form action="<?= base_url('/') ?>" method="post">
  <label for="user">Usuario</label>
  <input type="text" name="user" required>

  <label for="pass">Contraseña</label>
  <input type="password" name="pass" required>

  <button type="submit">Ingresar</button>
  Checked

  <?php if (!empty($msg)) : ?>
    <div>
      <span><?= $msg ?></span>
    </div>
  <?php endif; ?>
</form>
