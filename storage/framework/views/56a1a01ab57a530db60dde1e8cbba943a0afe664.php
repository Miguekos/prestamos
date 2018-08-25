<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <h1 class="panel-heading">Colaborador<a class="pull-right btn btn-sm btn-info" href="/register">Nuevo Colaborador</a></h1>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>%</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($users->id); ?></td>
                        <td><?php echo e($users->name); ?></td>
                        <td><?php echo e($users->email); ?></td>
                        <td><?php echo e($users->porcent_id); ?></td>
                        <td width="17%">
                            <form action="">
                                <!-- <a class="btn btn-sm btn-default">Ver</a> -->
                                <a href="<?php echo e(route('user.edit',$users->id)); ?>" class="btn btn-sm btn-default">Editar</a>
                                <!-- <a class="btn btn-sm btn-default">Eliminar</a> -->
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
        </div>
        <div class="panel-footer">
            miguekos1233@gmail.com
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>