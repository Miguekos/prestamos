<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Control de Clientes</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total a pagar</td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Atendido por:</td>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($clientes->id); ?></td>
                        <td><?php echo e($clientes->nombre); ?></td>
                        <td><?php echo e($clientes->dni); ?></td>
                        <td><?php echo e($clientes->monto_a_apagar . " S/."); ?></td>
                        <td><?php echo e($clientes->interes); ?></td>
                        <td><?php echo e($clientes->deuda . " S/."); ?></td>
                        <td><?php echo e($clientes->agregado); ?></td>
                        
                        <?php echo $__env->make('templates.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
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