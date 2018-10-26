<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
      <div class="row">
    <h1 style="color: white;" class="text-center panel-heading">Resultados de la fecha <?php echo e($inicio); ?> a la fecha <?php echo e($fin); ?></h1>
        <div class="col-md-8 col-md-offset-3">
          <br>
          <div class="form-group col-md-4">
            <label style="color: white;">Total deudas de clientes</label>
             <input class="form-control" type="text" readonly value="<?php echo e(number_format($deuda, 2)); ?>">
          </div>

          <div class="form-group col-md-4">
            <label style="color: white;">Total Prestamos a clientes</label>
             <input class="form-control" type="text" readonly value="<?php echo e(number_format($prestado, 2)); ?>">
          </div>
        </div>
        </div>
        

        <div class="panel panel-body">
        <div class="table-responsive">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Recaudado</th>
                <th>Ganancia</th>
                <th>A entregar</th>
                <th>Deposito</th>
                <th>Retiro</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $reporte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($reportes->id); ?></td>
                <td><?php echo e($reportes->usuario); ?></td>
                <td><?php echo e($reportes->recaudado); ?></td>
                <td><?php echo e($reportes->ganancia); ?></td>
                <td><?php echo e($reportes->entregar); ?></td>
                <td><?php echo e($reportes->deposito); ?></td>
                <td><?php echo e($reportes->retiro); ?></td>
                <td><?php echo e($reportes->fecha); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          
        
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
    <h1 style="color: white;" class="text-center panel-heading">Depositos y Retiros de: <?php echo e($inicio); ?> hasta <?php echo e($fin); ?></h1>
        <div class="panel panel-body">
        <div class="table-responsive">
          <table id="example2" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Monto</th>
                <th>Accion</th>
                <th>Motivo</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $abonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($reportes->id); ?></td>
                <td><?php echo e($reportes->monto); ?></td>
                <td><?php echo e($reportes->accion); ?></td>
                <td><?php echo e($reportes->motivo); ?></td>
                <td><?php echo e($reportes->fecha); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          </div>
        </div>


      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>