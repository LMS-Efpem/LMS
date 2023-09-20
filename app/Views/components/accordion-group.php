<?php
$grades = [
  [
    'title' => 'Primero',
    'section' => [
      'A',
      'B',
      'C',
    ],
  ],
  [
    'title' => 'Segundo',
    'section' => [
      'A',
      'B',
      'C',
    ],
  ],
  [
    'title' => 'Tercero',
    'section' => [
      'A',
      'B',
      'C',
    ],
  ],
];
?>

<style>
  .card-group {
    width: 18rem;
  }

  .card_header {
    padding-top: 2.5rem;
  }

  .accordion-body:hover {
    color: var(--bs-emphasis-color);
    background-color: var(--bs-secondary-bg);
  }
</style>

<div class="card card-group">
  <div class="card-body vstack gap-3">

    <div class="card card_header">
      <div class="card-body">
        <h1 class="card-title"><?= $group_grade ?></h1>
      </div>
    </div>

    <div class="accordion" id="accordion<?= $group_grade ?>">
      <?php foreach ($grades as $grade) : ?>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $grade['title'] ?>" aria-expanded="false" aria-controls="collapseOne">
              <?= $grade['title'] ?>
            </button>
          </h2>
          <?php foreach ($grade['section'] as $section) : ?>
            <div id="collapse<?= $grade['title'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordion<?= $group_grade ?>">
              <a href="<?= base_url() ?>" class="text-body-secondary text-decoration-none section">
                <div class="accordion-body"><?= $section ?></div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
