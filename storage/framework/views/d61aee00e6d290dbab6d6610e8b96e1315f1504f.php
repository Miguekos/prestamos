<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div id="sombra" class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Editar Cliente</h4></div>
                <div class="panel-body">
                  <form action="<?php echo e(route('cliente.update',$cliente->id)); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>

                    <div class="form-group">
                      <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" autofocus value="<?php echo e($cliente->nombre); ?>" name="nombre" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="telf">DNI</label>
                        <input type="text" class="form-control" name="dni" value="<?php echo e($cliente->dni); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo e($cliente->direccion); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="direccion">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo e($cliente->fecha); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="dni">Telf</label>
                        <input type="text" class="form-control" name="telf" value="<?php echo e($cliente->telf); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="prestamo">Prestamo</label>
                        <input type="number" class="form-control" onkeyup="calcular()" id=prestamo name="prestamo" value="<?php echo e($cliente->prestamo); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="interes">Interes %</label>
                        <input type="number" class="form-control" onkeyup="calcular()" id=interes name="interes" value="<?php echo e($cliente->interes); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Monto a Pagar</label>
                        <input type="number" step="any" class="form-control" readonly name="monto_a_apagar" value="<?php echo e($cliente->monto_a_apagar); ?>" id="total" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Dias del prestamo</label>
                        <input type="number" step="any" class="form-control" onkeyup="pago_por_dia()" id="dias" name="dias_para_pagar" value="<?php echo e($cliente->dias_para_pagar); ?>" placeholder="">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="">Pago por dia</label>
                        <input type="number" step="any" class="form-control" readonly id="totaldias" name="pago_dia" value="<?php echo e($cliente->pago_dia); ?>" placeholder="">
                      </div>

                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-success btn-block" value="Guardar">
                    </div>
                    <input type="hidden" name="agregado" value="<?php echo e(auth()->user()->name); ?>">
                  </form>
                </div>

                <div class="panel-footer">
                  miguekos1233@gmail.com
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">

function calcular(){
  var num1 = document.getElementById("prestamo").value;
  var num2 = document.getElementById("interes").value;
  var valor1 = num1 / 100;
  var valor2 = valor1 * num2;
  var total_a_pagar = parseFloat(valor2) + parseFloat(num1);
  document.getElementById("total").value = total_a_pagar;
  console.log("valor1: " + valor1);
  console.log("Num1: " + num1);
  console.log("Num2: " + num2);
};

function pago_por_dia(){
  var num3 = document.getElementById("total").value;
  var num4 = document.getElementById("dias").value;
  var total_dias = parseFloat(num3) / parseFloat(num4);
  // console.log("Total Dias: " + total_dias);
  document.getElementById("totaldias").value = total_dias.toFixed(2);
};
</script>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>