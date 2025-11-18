<div class="modal fade" id="modalNueva">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form action="controllers/DenunciasController.php?action=create" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Reporte de Denuncia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <div class="row g-3">

                <div class="col-md-2">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" placeholder="Autogenerado" disabled>
                </div>

                <div class="col-md-10">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="2" required></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ciudadano</label>
                    <input type="text" name="ciudadano" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono_ciudadano" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha_registro" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelto">Resuelto</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
