<?php $__env->startSection('content'); ?>
<!--<div class="col-md-4">-->
<!--  <div class="panel panel-default">-->
<!--    <div class="panel-heading"><h4>Cuentas</h4><small><u>Nota:</u> En este momento no se esta sumando la cantidad con la que se incia el dia.</a></small></div>-->

<!--    <div class="panel-body">-->
<!--      <strong><u>Recaudado:</u> </strong><?php echo e($suma); ?> ./s<br>-->
<!--      <strong><u>Ganancia de <?php echo e(auth()->user()->name); ?>:</u> </strong><?php echo e($total); ?> ./s<br>-->
<!--      <strong><u>A entregar:</u> </strong><?php echo e($entregar); ?> ./s<br>-->
<!--      <strong><u>Porcentaje:</u> </strong><?php echo e($porcent); ?> %<br>-->
<!--    </div>-->
<!--    <div class="panel-footer">-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<div class="col-md-12">
  <div class="panel panel-default">
    <!--<div class="panel-heading"><h4>Balance de <?php echo e(auth()->user()->name); ?> <a class="pull-right"><?php echo e($total); ?> ./s</a> </h4></div>-->
    <div class="panel-heading"><h4>Balance de <?php echo e(auth()->user()->name); ?> <a class="pull-right"></a> </h4></div>
    <div class="panel-body">
      <div class="table-responsive">
      <table id="example" class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Deuda</th>
            <th class="alert-success">Abono</th>
            <th>Fecha</th>
            <th>En Caja</th>
            <th>Empleado:</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($pagos->id); ?></td>
            <td><?php echo e($pagos->nombre); ?></td>
            <td><?php echo e($pagos->deuda); ?> ./s</td>
            <td><?php echo e($pagos->abono); ?> ./s</td>
            <td><?php echo e($pagos->fecha); ?></td>
            <td><?php echo e($pagos->a_caja); ?></td>
            <td><?php echo e($pagos->usuario); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <!-- <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Total a entregar:</td>
            <td><?php echo e($entregar); ?> ./s</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td>Total Gancia <?php echo e($porcent); ?>%:</td>
            <td><?php echo e($total); ?> ./s</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot> -->
      </table>
      </div>
    </div>

    <div class="panel-footer">
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>