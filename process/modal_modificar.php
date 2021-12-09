<div class="modal fade" id="editChildresn<?php echo $registro['id_incidencia']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h2 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recibir_actualizar.php">
        

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Descripción:</label>
                  <input type="text" name="desc_incidencia" class="form-control" value="<?php echo $registro['desc_incidencia']; ?>" required="true">
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <input type="hidden" name="id_incidencia" value="<?php echo $registro['id_incidencia']; ?>">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
       </form>

    </div>
  </div>
</div>