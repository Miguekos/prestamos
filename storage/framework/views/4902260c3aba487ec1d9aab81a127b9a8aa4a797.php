<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Clientes <a class="pull-right btn btn-sm btn-success" href="<?php echo e(url('/cliente/create')); ?>">Nuevo Cliente</a></h1></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Deuda</td>
                        <td>Agregado Por:</td>
                        <td width="20%">Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($clientes->id); ?></td>
                        <td><?php echo e($clientes->nombre); ?></td>
                        <td><?php echo e($clientes->dni); ?></td>
                        <td><?php echo e($clientes->prestamo); ?></td>
                        <td><?php echo e($clientes->agregado); ?></td>
                        <td width="20%">
                          <form class="" action="index.html" method="post">
                                <a href="<?php echo e(route('cliente.show',$clientes->id)); ?>" class="btn btn-sm btn-info">Ver</a>
                                <a href="<?php echo e(route('cliente.edit',$clientes->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a class="btn btn-sm btn-danger">Eliminar</a>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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