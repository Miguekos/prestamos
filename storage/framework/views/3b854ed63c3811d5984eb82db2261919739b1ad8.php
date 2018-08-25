<?php $__env->startSection('content'); ?>
<h1 class="jumbotron text-center">Control de Prestamos</h1>
<hr>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1 class="panel-title">Acceso a la aplicacion</h1>
            </div>

        <div class="panel-body">

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <label for="email">Email</label>
                    <input  class="form-control"
                    autofocus
                    value="<?php echo e(old('email')); ?>"
                    name="email"
                    type="email"
                    placeholder="Ingresa  tu email">
                    <?php echo $errors->first('email','<span class="help-block">:message</span>'); ?>

                </div>

                <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                    <label for="password">Contraseña</label>
                    <input  class="form-control"
                    name="password"
                    type="password"
                    placeholder="Ingresa tu Contraseña">
                    <?php echo $errors->first('password','<span class="help-block">:message</span>'); ?>

                </div>

                <button class="btn btn-sm btn-primary btn-block">Acceder</button>

            </form>

        </div>

            <div class="panel-footer">
                miguekos1233@gmail.com
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>