<?php $__env->startSection('content'); ?>

<div class="panel panel-default">
  <div class="panel-heading"><h4> Pendientes del dia <?php echo e(date('d-m-Y', strtotime('-1 day'))); ?></h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example" class="table table-bordered table-hover">
      <thead>
        <tr>
          <td>#</td>
          <td>Nombre</td>
          <td>DNI</td>
          <td>telf</td>
          <td class="alert-danger">Deuda</td>
          <td>Agregado Por:</td>
          <td>Ultimo abono</td>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $pendienteayer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($clientes->id); ?></td>
          <td><?php echo e($clientes->nombre); ?></td>
          <td><?php echo e($clientes->telf); ?></td>
          <td><?php echo e($clientes->dni); ?></td>
          <td><?php echo e(number_format($clientes->deuda, 2)); ?></td>
          <td><?php echo e($clientes->agregado); ?></td>
          <td><?php echo e($clientes->updated_at); ?></td>
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
  <div class="panel-heading"><h4> Pendientes del dia <?php echo e(date('d-m-Y', strtotime('-2 day'))); ?></h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <td>#</td>
          <td>Nombre</td>
          <td>DNI</td>
          <td>telf</td>
          <td class="alert-danger">Deuda</td>
          <td>Agregado Por:</td>
          <td>Ultimo abono</td>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $pendienteante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($clientes->id); ?></td>
          <td><?php echo e($clientes->nombre); ?></td>
          <td><?php echo e($clientes->telf); ?></td>
          <td><?php echo e($clientes->dni); ?></td>
          <td><?php echo e(number_format($clientes->deuda, 2)); ?></td>
          <td><?php echo e($clientes->agregado); ?></td>
          <td><?php echo e($clientes->updated_at); ?></td>
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