<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Montos para inciar</h4></div>
                <div class="panel-body">
                  <form class="" action="<?php echo e(route('cierre.update',$montos->id)); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>

                  <div class="form-group col-sm-4">
                    <label for="">Monto</label>
                    <input class="form-control" type="text" name="monto" value="<?php echo e($montos->monto); ?>">
                    <input class="btn btn-sm btn-success" type="submit" value="Actualizar">
                  </div>
                </form>

                </div>
                <div class="panel-footer">
                  <small>miguekos1233@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>