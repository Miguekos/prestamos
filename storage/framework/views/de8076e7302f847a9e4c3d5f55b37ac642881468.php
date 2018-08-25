<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <h4 class="panel-heading text-center">Detalles de:</b> <u><?php echo e($clientes->nombre); ?></u></h4>
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><b>Datos</h4>
                </div>
                <div class="panel-body">
                    <strong>Nombre: </strong> <?php echo e($clientes->nombre); ?><br>
                    <strong>Dni: </strong> <?php echo e($clientes->dni); ?><br>
                    <strong>Direccion: </strong> <?php echo e($clientes->direccion); ?><br>
                    <strong>Fecha: </strong> <?php echo e($clientes->fecha); ?><br>
                    <strong>Telefono: </strong> <?php echo e($clientes->telf); ?><br>
                    <strong>Prestamo: </strong> <?php echo e($clientes->prestamo); ?> ./S<br>
                    <strong class="alert-danger">Deuda: </strong> <?php echo e($clientes->deuda); ?> ./S<br>
                    <strong>Interes: </strong> <?php echo e($clientes->interes); ?><br>
                    <strong>Monto a pagar: </strong> <?php echo e($clientes->monto_a_apagar); ?><br>
                    <strong>Dias para pagar: </strong> <?php echo e($clientes->dias_para_pagar); ?><br>
                    <strong>Pago por dia:</strong> <?php echo e($clientes->pago_dia); ?><br>
                    <strong>Agregado por: </strong> <?php echo e($clientes->agregado); ?><br>
                </div>
                <div class="panel-footer">
                    <small>miguekos1233@gmail.com</small>
                </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>