<?php if (session('msg')) : ?>
  <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" style="width: fit-content; position: absolute; bottom: 3rem; left: 3rem;">
    <?= session('msg') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
