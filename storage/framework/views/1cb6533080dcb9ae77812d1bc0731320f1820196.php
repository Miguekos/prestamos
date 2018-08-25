<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">

        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Clientes <a class="pull-right btn btn-sm btn-success" href="<?php echo e(url('/cliente/create')); ?>">Nuevo Cliente</a></h4></div>
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
                        <td>Fecha del prestamo</td>
                        <td width="20%">Accion</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($clientes->id); ?></td>
                        <td><?php echo e($clientes->nombre); ?></td>
                        <td><?php echo e($clientes->telf); ?></td>
                        <td><?php echo e($clientes->dni); ?></td>
                        <td><?php echo e($clientes->deuda); ?></td>
                        <td><?php echo e($clientes->agregado); ?></td>
                        <td><?php echo e($clientes->fecha); ?></td>
                        <td width="20%">
                        <?php if(auth()->user()->user_id == 1): ?>
                          <form action="<?php echo e(route('cliente.destroy',$clientes->id)); ?>" method="post">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field('DELETE')); ?>

                                <a href="<?php echo e(route('cliente.show',$clientes->id)); ?>" class="btn btn-sm btn-info">Ver</a>
                                <a href="<?php echo e(route('cliente.edit',$clientes->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                          </form>
                          <?php else: ?>
                          <a href="<?php echo e(route('cliente.show',$clientes->id)); ?>" class="btn btn-sm btn-info">Ver</a>
                          <?php endif; ?>
                        </td>
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