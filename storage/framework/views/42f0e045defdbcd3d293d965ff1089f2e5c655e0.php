<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <h1 style="color: white;" class="text-center panel-heading">Cuentas de <?php echo e(auth()->user()->name); ?></h1>
    <div class="row">
      <form action="<?php echo e(route('report.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div id="sombra" class="form-group col-md-12">
          <input class="form-control" type="hidden" name="usuario" value="<?php echo e(auth()->user()->name); ?>">
          <input class="form-control" type="hidden" name="usuario_id" value="<?php echo e(auth()->user()->id); ?>">
          <div class="col-md-2">
            <label style="color: white;" for="">Recaudado</label>
            <input class="form-control" type="number" step="any" readonly name="recaudado" value="<?php echo e(round($recaudado, 2)); ?>">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Ganancia</label>
            <input class="form-control" type="number" step="any" readonly name="ganancia" value="<?php echo e(round($ganancia, 2)); ?>">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">A entregar</label>
            <input class="form-control" type="number" step="any" readonly name="entregar" value="<?php echo e(round($entregar, 2)); ?>">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Deposito</label>
            <input class="form-control" type="number" step="any" readonly name="deposito" value="<?php echo e($inicio_suma); ?>">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Retiro</label>
            <input class="form-control" type="number" step="any" readonly name="retiro" value="<?php echo e($fin_resta); ?>">
          </div>
          <div class="col-md-2">
            <label style="color: white;" for="">Fecha</label>
            <input class="form-control" type="date" readonly name="fecha" value="<?php echo e(date('Y-m-d')); ?>">
            <br>
          </div>
              <input class="btn btn-success btn-block" type="submit" value="Cerrar cuenta">
        </div>
      </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Cierres diarios </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Colaborador</th>
                        <th>Recaudado</th>
                        <th>Ganancia</th>
                        <th>A entregar</th>
                        <th>Deposito</th>
                        <th>Retiro</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $reporte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($reportes->id); ?></td>
                        <td><?php echo e($reportes->usuario); ?></td>
                        <td><?php echo e($reportes->recaudado); ?></td>
                        <td><?php echo e($reportes->ganancia); ?></td>
                        <td><?php echo e($reportes->entregar); ?></td>
                        <td><?php echo e($reportes->deposito); ?></td>
                        <td><?php echo e($reportes->retiro); ?></td>
                        <td><?php echo e($reportes->fecha); ?></td>
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
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Depositos<a class="pull-right"><?php echo e($inicio_suma); ?> ./s</a> </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example1" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Dia</th>
                        <th>Tipo</th>
                        <th>Motivo</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $inicio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $montos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($montos->id); ?></td>
                          <td><?php echo e($montos->monto); ?></td>
                          <td><?php echo e($montos->created_at); ?></td>
                          <td><?php echo e($montos->accion); ?></td>
                          <td><?php echo e($montos->motivo); ?></td>
                          <td width="20%">
                            <form action="<?php echo e(route('cierre.destroy',$montos->id)); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                                  <a href="<?php echo e(route('cierre.edit',$montos->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                                  <!-- <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"> -->
                            </form>
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


<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Retiros<a class="pull-right"><?php echo e($fin_resta); ?> ./s</a> </h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table id="example2" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Dia</th>
                        <th>Motivo</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $fin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $montos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($montos->id); ?></td>
                        <td><?php echo e($montos->monto); ?></td>
                        <td><?php echo e($montos->created_at); ?></td>
                        <td><?php echo e($montos->motivo); ?></td>
                        <td width="20%">
                          <form action="<?php echo e(route('cierre.destroy',$montos->id)); ?>" method="post">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field('DELETE')); ?>

                                <a href="<?php echo e(route('cierre.edit',$montos->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <!-- <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"> -->
                          </form>
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