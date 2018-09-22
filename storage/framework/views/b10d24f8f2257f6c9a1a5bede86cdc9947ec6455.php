<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
  <div class="panel-heading"><h4>Balance de <?php echo e(auth()->user()->name); ?></h4></div>

  <div class="panel-body">
    <div class="table-responsive">
    <table id="example" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Total Recauado</th>
          <th>A entregar</th>
          <th>Pago Empleado</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($pagos->usuario); ?></td>
          <td><?php echo e(number_format($pagos->recaudado, 2)); ?>  ./s</td>
          <td><?php echo e(number_format($pagos->recaudado - $pagos->pago_empleado, 2)); ?>  ./s</td>
          <td><?php echo e(number_format($pagos->pago_empleado, 2)); ?> ./s</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><h4>Detalle de abonos</h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example2" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Cliente</th>
          <th>Abonó</th>
          <th>Fecha</th>
          <th>Atendido por:</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $recaudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recaudos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($recaudos->id); ?></td>
          <td><?php echo e($recaudos->nombre); ?></td>
          <td><?php echo e($recaudos->abono); ?>  ./s</td>
          <td><?php echo e($recaudos->created_at); ?></td>
          <td><?php echo e($recaudos->usuario); ?></td>
          <td>
            <form class="" action="<?php echo e(route('eliminarcontrol.destroy',$recaudos->id)); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('DELETE')); ?>

              <input type="submit" class="btn btn-xs btn-danger" value="Eliminr">
            </form>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>