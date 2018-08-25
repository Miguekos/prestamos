<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Colaborador</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('user.update',$user->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                                </div>
                            </div>

                            <input type="hidden" name="barber_id" value="1">

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Rol</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value="<?php echo e($user->user_id); ?>"><?php echo e($user->user_id); ?></option>
                                        <option value="2">Empleado</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="porcent_id" class="col-md-4 control-label">% de ganancia</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" step="any"value="<?php echo e($user->porcent_id); ?>" name="porcent_id" id="porcent_id" placeholder="% de ganacia">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                <form action="<?php echo e(route('user.update',$user->id)); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PATCH')); ?>

                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>