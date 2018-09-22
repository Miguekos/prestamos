<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <?php if(auth()->user()->user_id == 1): ?>
            <h4 style="color: white;" class="panel-heading text-center">Bienvenido Administrador</h4>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Detalles de:</b> <?php echo e(auth()->user()->name); ?></h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> <?php echo e(auth()->user()->name); ?><br>
                    <strong>Email:</strong> <?php echo e(auth()->user()->email); ?><br>
                    <strong>Rol:</strong> <?php echo e($rol); ?><br>
                    <strong>Empleados:</strong> <?php echo e($total_u); ?><br>
                    <strong>Clientes:</strong> <?php echo e($total_c); ?><br>
                    <strong>Total Recaudado:</strong> <?php echo e(number_format($total_r, 2)); ?> ./S<br>
                    <strong>Total Deudas Por Cobrar:</strong> <?php echo e(number_format($total_d, 2)); ?> ./S<br>
                    <strong class="alert-danger">Clientes con deuda:</strong> <?php echo e(number_format($total_dt, 2)); ?><br>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
            <?php else: ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Detalles de:</b> <?php echo e(auth()->user()->name); ?></h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> <?php echo e(auth()->user()->name); ?><br>
                    <strong>Email:</strong> <?php echo e(auth()->user()->email); ?><br>
                    <strong>Rol:</strong> <?php echo e($rol); ?><br>

                    <form action="<?php echo e(route('cierre.store')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <hr>
                      <div class="form-group col-md-6">
                        <label><u>Depositar:</u></label>
                        <input class="form-control col-md-2" type="number" step="any" name="monto">
                        <input class="form-control col-md-2" type="hidden" name="accion" value="deposito">
                        <input class="form-control col-md-2" type="hidden" name="fecha" value="<?php echo e(date('Y-m-d')); ?>">
                        <input class="form-control col-md-2" type="text" name="motivo" placeholder="Escriba un Motivo">
                        <input class="btn btn-sm btn-success form-control col-md-2" type="submit" value="Deposito">
                        <input class="form-control col-md-2" type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                      </div>
                    </form>
                    <form action="<?php echo e(route('cierre.store')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>


                      <div class="form-group col-md-6">
                        <label><u>Retirar:</u></label>
                        <input class="form-control col-md-2" type="number" step="any" name="monto">
                        <input class="form-control col-md-2" type="hidden" name="accion" value="retiro">
                        <input class="form-control col-md-2" type="hidden" name="fecha" value="<?php echo e(date('Y-m-d')); ?>">
                        <input class="form-control col-md-2" type="text" name="motivo" placeholder="Escriba un Motivo">
                        <input class="btn btn-sm btn-danger form-control col-md-2" type="submit" value="Retiro">
                        <input class="form-control col-md-2" type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                      </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
            <?php endif; ?>
            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>