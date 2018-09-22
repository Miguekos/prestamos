<?php

namespace App\Http\Controllers;
use App\Barber;
use App\Report;
use App\Roles;
use App\User;
use App\Pago;
use App\Cliente;
use App\Nomina;
use App\Control;
use App\Cierre;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {

        $id_user = Auth::user()->user_id;
        $id = Auth::user()->id;
        $barber_id = Auth::user()->barber_id;

        // $inicio = Cierre::where('user_id',$id)->orderBy('id','desc')->first();
        //
        // if ($inicio){
        //     ])->sum('monto');
        //   $calc1 = Cierre::where([
        //     'user_id' => $id,
        //     'accion' => 'deposito',
        //   $calc2 = Cierre::where([
        //     'user_id' => $id,
        //     'accion' => 'retiro',
        //     ])->sum('monto');
        //   $inicio_m = $calc1 - $calc2;
        // }else{
        //   $inicio_m = 0;
        // }
        // return $inicio->monto;

        $roles = Roles::where([
            'id' => $id_user,
        ])->first();
        $rol = $roles->nombre;

        // $barbers = Barber::where([
        //     'id' => $barber_id,
        // ])->first();
        // $barber = $barbers->nombre;

        $total_r = Pago::all()->sum('abono');
        $total_c = Cliente::all()->count('id');
        $total_u = User::all()->count('id') - 1;
        $total_d = Cliente::all()->sum('deuda');
        $total_dt = Cliente::where('deuda', '>', 0)->count('id');

        return view('dashboard',compact('rol','barber','total_r','total_c','total_u','total_d','total_dt','calc1','calc2'));
    }


    public function control_admin()
    {
      $now = new DateTime('America/Lima');
      // $hora = $now->format('d-M-Y H:i:s');
      $hora = $now->format('d-m-Y H:i');
      $cliente = Cliente::all();
      $control = Control::all();
      return view('control_admin',compact('control','cliente','hora'));
    }


    public function pago_admin()
    {

    $user = DB::table('nominas')
             ->select('usuario','user_id_nomina', DB::raw('sum(abono_recaudado) as recaudado'), DB::raw('sum(pago_empleado) as pago_empleado'))
             ->where('created_at','>','2018-07-30 06:09:35')
             ->groupBy('usuario','user_id_nomina')
             ->get();

      $recaudo = Pago::where('created_at','>','2018-08-15 06:09:35')->get();
      return view('pago_admin',compact('user','recaudo'));

    }


    public function cambioclave(Request $request, $empleado)
    {
      $password = bcrypt($request->password);
      DB::table('users')
            ->where('id', $empleado)
            ->update(['password' => $password]);
      return back()->with('flash','Se actualizo la contraseña correctamente');

    }


    public function cambioclaveform()
    {
      return view('auth.reset');

    }

    public function reporte(Request $request)
    {
      $colaborador = $request->colaborador;
      $inicio = $request->inicio;
      $fin = $request->fin;
      //return $request->all();
      $reporte = Report::whereBetween('fecha',[$request->inicio,$request->fin])
                  ->where('usuario_id', $colaborador)
                  ->get();
      $abonos = Cierre::whereBetween('fecha',[$request->inicio,$request->fin])
                  ->where('user_id', $colaborador)
                  ->get();

      $deuda = Cliente::where('agregado_id', $colaborador)
                  ->sum('deuda');

      $prestado = Cliente::where('agregado_id', $colaborador)
                  ->sum('prestamo');
      // return $reporte;
      // return back()->with('flash','Aun no tienes reportes por mostrar..!!');
      return view('report.show',compact('reporte','abonos','inicio','fin','deuda','prestado'));

    }

    public function eliminarcontrol($monto)
    {
      $todo = Pago::find($monto);
      $abono = $todo->abono;
      $id = $todo->cliente_id;
      // return $todo;
      $deudaActual = Cliente::find($id);
      $total = $deudaActual->deuda + $abono = $todo->abono;
      Cliente::where('id',$id)
              ->update(['deuda' => $total,'abono_id' => 0]);
      Pago::find($monto)
              ->delete();
      return back()->with('flash', 'Se elimino correctamente el abono..!!');
    }

    public function pendiente()
    {
      $ayer = date('Y-m-d', strtotime('-1 day'));
      $anteayer = date('Y-m-d', strtotime('-2 day'));
      $pendienteayer = Cliente::where('abono_id','0')
            ->where('updated_at' , 'LIKE', '%'.$ayer.'%')
            ->get();
            // ->toSql();
      $pendienteante = Cliente::where('abono_id','0')
            ->where('updated_at' , 'LIKE', '%'.$anteayer.'%')
            ->get();
            return view('pendientes',compact('pendienteayer','pendienteante'));
            // return $pendiente;

    }


}
