<!-- El `data-bs-target` debe coincidir con el `id` del modal -->
<!-- Botón  -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Abrir Modal</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Título del modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Mensaje del modal</p>
        <p class="text-secondary">Texto complementario</p>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('/') ?>" class="btn btn-warning">Sí</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
