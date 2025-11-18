<div class="modal fade" id="modalEditar">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form action="controllers/DenunciasController.php?action=update" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Editar Reporte de Denuncia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">

            <div class="row g-3">

                <div class="col-md-2">
                    <label class="form-label">ID</label>
                    <input type="text" id="edit_id_show" class="form-control" disabled>
                </div>

                <div class="col-md-10">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" id="edit_titulo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" id="edit_descripcion" class="form-control" rows="2" required></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ubicación</label>
                    <input type="text" name="ubicacion" id="edit_ubicacion" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ciudadano</label>
                    <input type="text" name="ciudadano" id="edit_ciudadano" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono_ciudadano" id="edit_telefono" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha_registro" id="edit_fecha" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select name="estado" id="edit_estado" class="form-select" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelto">Resuelto</option>
                    </select>
                </div>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
