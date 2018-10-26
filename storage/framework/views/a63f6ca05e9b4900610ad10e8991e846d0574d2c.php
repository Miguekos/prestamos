<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Prestamos</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

            <?php if(auth()->user()->user_id == 1): ?>
                <li class=""><a href="/cliente">Clientes <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/pago_admin">Control <span class="sr-only">(current)</span></a></li>
                <!-- <li class=""><a href="/control_admin">Control <span class="sr-only">(current)</span></a></li> -->
                <li class=""><a href="/report">Reportes <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/pendiente">Pendientes <span class="sr-only">(current)</span></a></li>
                <!-- <li><a href="#">Barberias</a></li> -->
                <li><a href="/user">Colaborador</a></li>
                <!-- <li class=""><a href="/nomina">Cierre de Caja <span class="sr-only">(current)</span></a></li> -->
            <?php else: ?>
                <li class=""><a href="/cliente">Clientes <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/control">Pagos <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/pago">Control <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/cierre">Contabilidad <span class="sr-only">(current)</span></a></li>
            <?php endif; ?>

            
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <?php if(auth()->user()->user_id == 2): ?>
            <li><a href="#"></a></li>
          <?php else: ?>
          <?php endif; ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(auth()->user()->name); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/cambioclaveform">Cambiar Contraseña</a></li>
              <li role="separator" class="divider"></li>
              <li class="text-center">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-default">Salir</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
