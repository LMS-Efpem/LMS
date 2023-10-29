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
<?= view('components/teacherNavBar') ?>

<!-- BREADCRUMB -->
<ul class="breadcrumb ms-5">
  <li class="breadcrumb-item active" aria-current="page">Inicio</li>
</ul>

<main class="mx-5">
  <header>
    <h1>Noticias</h1>
  </header>

  <!-- Listado de noticias -->
  <section class="notices">
    <?php foreach ($data as $post) : ?>
      <a href="<?= base_url('/t/noticia/'.$post['id']) ?>" class="d-block position-relative text-decoration-none">
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
