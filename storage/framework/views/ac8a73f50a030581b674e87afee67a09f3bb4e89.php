<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Control por abonar</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total prestado
                        </td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                        <td>Accion</td>
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
                        <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal<?php echo e($clientes->id); ?>">Abonar</a>
                        </td>
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


<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>Cliente que abonaron</h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Total prestado
                        </td>
                        <td>%</td>
                        <td class="alert-danger">Deuda</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $abonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abono): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($abono->id); ?></td>
                        <td><?php echo e($abono->nombre); ?></td>
                        <td><?php echo e($abono->dni); ?></td>
                        <td><?php echo e($abono->monto_a_apagar . " S/."); ?></td>
                        <td><?php echo e($abono->interes); ?></td>
                        <td><?php echo e($abono->deuda . " S/."); ?></td>
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