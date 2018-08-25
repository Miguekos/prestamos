@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading"><h4>Balance de {{ auth()->user()->name }} <small class="pull-right"><u>Nota:</u> En este momento no se esta sumando la cantidad con la que se incia el dia.</a></small></h4></div>

  <div class="panel-body">
    <div class="table-responsive">
    <table id="example" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Total Recauado</th>
          <th>A entregar</th>
          <th>Pago Empleado</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $pagos)
        <tr>
          <td>{{ $pagos->usuario }}</td>
          <td>{{ $pagos->recaudado }}  ./s</td>
          <td>{{ $pagos->recaudado - $pagos->pago_empleado }}  ./s</td>
          <td>{{ $pagos->pago_empleado }} ./s</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><h4>Detalle de abonos</h4></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table id="example2" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Cliente</th>
          <th>Abonó</th>
          <th>Fecha</th>
          <th>Atendido por:</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($recaudo as $recaudos)
        <tr>
          <td>{{ $recaudos->id }}</td>
          <td>{{ $recaudos->nombre }}</td>
          <td>{{ $recaudos->abono }}  ./s</td>
          <td>{{ $recaudos->created_at }}</td>
          <td>{{ $recaudos->usuario }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>

  </div>
  <div class="panel-footer">
  </div>


</div>
@endsection
