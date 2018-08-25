<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Prestamos | Inicio</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

</head>
<body>
    <?php if(auth()->guard()->guest()): ?>

    <?php else: ?>
        <?php echo $__env->make('templates.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <div class="container">
    <?php if(session()->has('flash')): ?>
        <div class="col-md-12 alert alert-info">
            <?php echo e(session('flash')); ?>

        </div>
    <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/dataTables.bootstrap.min.js')); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable();
} );
</script>

</html>
