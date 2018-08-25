<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <?php if(auth()->user()->user_id == 1): ?>
            <h1 class="panel-heading text-center">Bienvenido Administrador</h1>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><b>Detalles de:</b> <?php echo e(auth()->user()->name); ?></h1>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> <?php echo e(auth()->user()->name); ?><br>
                    <strong>Email:</strong> <?php echo e(auth()->user()->email); ?><br>
                    <strong>Rol:</strong> <?php echo e($rol); ?><br>
                    <strong>Empleados:</strong> <?php echo e($rol); ?><br>
                    <strong>Clientes:</strong> <?php echo e($rol); ?><br>


                    <!-- <strong>Ventas Barberia 1:</strong> 350 ./S<br>
                    <strong>Ventas Barberia 2:</strong> 1250 ./S<br>
                    <strong>Ventas Barberia 3:</strong> 750 ./S<br> -->
                    <strong>Total:</strong> 2350 ./S<br>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>

            <?php else: ?>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><b>Detalles de:</b> <?php echo e(auth()->user()->name); ?></h1>
                </div>
                <div class="panel-body">
                    <strong>Nombre:</strong> <?php echo e(auth()->user()->name); ?><br>
                    <strong>Email:</strong> <?php echo e(auth()->user()->email); ?><br>
                    <strong>Rol:</strong> <?php echo e($rol); ?><br>
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