<div class="modal fade" id="modalEliminar">
  <div class="modal-dialog">
    <div class="modal-content" style="background:#d62828;color:white;">
      <form action="controllers/DenunciasController.php?action=delete" method="POST">
        <div class="modal-header border-0">
          <h5 class="modal-title">Eliminar registro</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <p>¿Deseas eliminar este registro?</p>
          <input type="hidden" name="id_delete" id="delete_id">
        </div>

        <div class="modal-footer border-0">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-outline-light">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
