<div class="modal fade" id="deleteChildresn<?php echo $registro['id_incidencia']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    ¿Realmente deseas eliminar Incidencia?
                </h4>
            </div>
            <form method="POST" action="recibir_eliminar.php">
                <input type="hidden" name="id_incidencia" value="<?php echo $registro['id_incidencia']; ?>">
                <div class="modal-body">
                    <strong style="text-align: center !important"><?php echo $registro['id_incidencia']; ?></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>