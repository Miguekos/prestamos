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

            @if(auth()->user()->user_id == 1)
                <li class=""><a href="/cliente">Clientes <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/pago_admin">Control <span class="sr-only">(current)</span></a></li>
                <!-- <li class=""><a href="/control_admin">Control <span class="sr-only">(current)</span></a></li> -->
                <li class=""><a href="/report">Reportes <span class="sr-only">(current)</span></a></li>
                <!-- <li><a href="#">Barberias</a></li> -->
                <li><a href="/user">Colaborador</a></li>
                <!-- <li class=""><a href="/nomina">Cierre de Caja <span class="sr-only">(current)</span></a></li> -->
            @else
                <li class=""><a href="/cliente">Clientes <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/control">Pagos <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/pago">Control <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/cierre">Contabilidad <span class="sr-only">(current)</span></a></li>
            @endif

            {{--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
            </li>--}}
        </ul>
        {{--<form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>--}}
        <ul class="nav navbar-nav navbar-right">
          @if(auth()->user()->user_id == 2)
            <li><a href="#"></a></li>
          @else
          @endif
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name  }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/cambioclaveform">Cambiar Contraseña</a></li>
              <li role="separator" class="divider"></li>
              <li class="text-center">
                <form action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  <button class="btn btn-default">Salir</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
