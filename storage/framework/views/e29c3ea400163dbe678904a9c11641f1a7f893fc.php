<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
      <div class="row">
        <form action="<?php echo e(route('reporte')); ?>" method="post">

          <?php echo e(csrf_field()); ?>

          <div class="col-md-8 col-md-offset-3">

            <div class="form-group col-md-4">
              <label style="color: white;">Inicio</label>
            	 <input class="form-control" type="date" name="inicio">
            </div>

            <div class="form-group col-md-4">
              <label style="color: white;">Fin</label>
            	 <input class="form-control" type="date" name="fin">
            </div>

          </div>

          <div class="form-group col-md-4 col-md-offset-4">
            <select class="form-control" name="colaborador">
              <option value="0">--SELECCIONE UN COLABORADOR--</option>
              <?php $__currentLoopData = $colaboradors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colaborador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($colaborador->id); ?>"><?php echo e($colaborador->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

            <div class="form-group col-md-4 col-md-offset-4">
              <input type="submit" class="btn btn-info btn-block" value="Buscar">
            </div>

        </form>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>