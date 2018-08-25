 <div class="container">

    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo e($clientes->id); ?>" role="dialog">
        <form id="update" action="<?php echo e(route('pago.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-right">Abonar a cuenta de <?php echo e($clientes->nombre); ?> -- Pago por dia: <?php echo e($clientes->pago_dia); ?> ./S</h4>
                    <input type="hidden" name="nombre" value="<?php echo e($clientes->nombre); ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo e($clientes->id); ?>">
                </div>
                <div class="modal-body">
                  <div class="form-group col-md-6">
                    <label for="deuda">Deuda</label>
                    <input type="text" class="form-control" value="<?php echo e($clientes->deuda); ?>" name="deuda" id="deuda">
                    <input type="hidden" class="form-control" value="<?php echo e($clientes->prestamo); ?>" name="prestamo" id="prestamo">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="abono">Abono</label>
                    <input type="text" class="form-control" required name="abono" id="abono">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fecha">Fecha</label><?php echo e($hora); ?>

                    <input type="text" class="form-control" name="fecha" value="<?php echo e($hora); ?>" id="fecha">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="a_caja">A Caja</label>
                    <select class="form-control" name="a_caja">
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="update" class="btn btn-default">Guardar</button>
                </div>
                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                <input type="hidden" name="usuario" value="<?php echo e(auth()->user()->name); ?>">
            </div>
        <!-- </div> -->
        </form>
    </div>
</div>
