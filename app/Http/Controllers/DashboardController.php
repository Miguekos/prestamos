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
        //   $calc1 = Cierre::where([
        //     'user_id' => $id,
        //     'accion' => 'deposito',
        //     ])->sum('monto');
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
      //sumar y calcular por usuarios
    //   $usuarios = User::all();
    //   $id = auth()->user()->id;
    //   $suma= Pago::where([
    //     'a_caja' => 'Si',
    //     ])->sum('abono');
    //   $porcent = auth()->user()->porcent_id;
    //   $porce = 0;
    //   $total = 0;
    //   $pago = Pago::all();
    //   $entregar = 0;
    //   return view('pago_admin',compact('pago','total','porcent','entregar','usuarios'));

    // $total_r = Pago::all();

    // $despachos=DB::table('pagos')
    //         ->join('productos', 'despachos.id_producto', '=', 'productos.id')
    //         ->where('despachos.id_cliente', '=', $id)
    //          ->whereBetween('despachos.fecha', array($fechain,$fechater))
    //         ->select('productos.nombre',DB::raw('sum(despachos.cantidad) as cantidad'),DB::raw('sum(total) as total'))
    //         ->groupBy('despachos.id_producto')
    //         ->get();



    $user = DB::table('nominas')
             ->select('usuario','user_id_nomina', DB::raw('sum(abono_recaudado) as recaudado'), DB::raw('sum(pago_empleado) as pago_empleado'))
             ->where('created_at','>','2018-07-30 06:09:35')
             ->groupBy('usuario','user_id_nomina')
             ->get();

      // foreach ($user as $key) {
      //
      //   $existe = Cierre::where('user_id',$key->user_id_nomina)->first();
      //   if ($existe){
      //     $inicio_m = Cierre::where('user_id',$key->user_id_nomina)->orderBy('id','desc')->first();
      //     $calc = $key->recaudado - $key->pago_empleado;
      //     $inicio_d = $inicio_m->monto;
      //     $inicio_m = $inicio_m->monto + $calc;
      //     $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
      //     return view('pago_admin',compact('user','recaudo','inicio_m','inicio_d'));
      //   }else{
      //     $inicio_d = 0;
      //      $inicio_m = 0;
      //      $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
      //      return view('pago_admin',compact('user','recaudo','inicio_m','inicio_d'));
      //
      //    }
      // }
      $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
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
      $inicio = $request->inicio;
      $fin = $request->fin;
      //return $request->all();
      $reporte = Report::whereBetween('fecha',[$request->inicio,$request->fin])->get();
      $abonos = Cierre::whereBetween('fecha',[$request->inicio,$request->fin])->get();
      // return $reporte;
      // return back()->with('flash','Aun no tienes reportes por mostrar..!!');
      return view('report.show',compact('reporte','abonos','inicio','fin'));

    }


}
