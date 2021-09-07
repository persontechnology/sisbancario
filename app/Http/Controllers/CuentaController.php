<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\User;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index($idCliente)
    {
        $user=User::find($idCliente);
        $data = array(
            'cuentas' => $user->cuentas ,
            'cliente'=>$user
        );
        return view('cuentas.index',$data);
    }

    public function guardar(Request $request)
    {
        
        $monto_actual=Cuenta::where('user_id',$request->clienteId)
                            ->latest()->first()->monto??0;
        
        if($request->tipo=='deposito'){
            $monto_actual=$monto_actual+$request->monto;
            $this->proceso($monto_actual,$request->tipo,$request->clienteId,$request->monto);
            $msg="DEPOSITO REALIZADO";
        }

        if($request->tipo=='retiro'){
            if($monto_actual>=$request->monto){
                $monto_actual=$monto_actual-$request->monto;
                $this->proceso($monto_actual,$request->tipo,$request->clienteId,$request->monto);
                $msg="RETIRO REALIZADO";
            }else{
                $msg="SALDO INSUFICIENTE";
            }
        }

        $request->session()->flash('estado',$msg);
        return redirect()->route('cuenta',$request->clienteId);
    }

    public function proceso($monto,$tipo,$cliente_id,$valor)
    {
        $cuenta=new Cuenta();
        $cuenta->monto=$monto;
        $cuenta->tipo=$tipo;
        $cuenta->user_id=$cliente_id;
        $cuenta->valor=$valor;
        $cuenta->save();
    }


    public function depositos($idCliente)
    {

        $user=User::find($idCliente);
        $data = array(
            'cuentas' => $user->cuentas ,
            'cliente'=>$user
        );
        return view('cuentas.deposito',$data);
    }

    public function guardarDeposito(Request $request)
    {
        $monto_actual=Cuenta::where('user_id',$request->clienteId)
        ->latest()->first()->monto??0;
        $monto_actual=$monto_actual+$request->monto;
        $this->proceso($monto_actual,'deposito',$request->clienteId,$request->monto);
        $request->session()->flash('estado','SOLO DEPOSITO REALIZADO');
        return redirect()->route('cuenta',$request->clienteId);
        
    }
}
