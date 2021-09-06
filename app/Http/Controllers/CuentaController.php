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
        $cuenta=new Cuenta();
        $cuenta->monto=$request->monto;
        $cuenta->tipo=$request->tipo;
        $cuenta->user_id=$request->clienteId;
        $cuenta->save();
    }
}
