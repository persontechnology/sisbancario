<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $data = array('listado_clientes' => User::all() );
        return view('clientes.index',$data);
    }
    public function nuevo()
    {
        return view('clientes.nuevo',['bancos'=>Banco::all()]);
    }

    public function guardar(Request $request)
    {
        $cliente=new User();
        $cliente->name='';
        $cliente->email=$request->email;
        $cliente->password=$request->cedula.'@bg.com';
        $cliente->nombres=$request->nombres;
        $cliente->apellidos=$request->apellidos;
        $cliente->cedula=$request->cedula;
        $cliente->banco_id=$request->banco_radio;
        $cliente->save();
        $request->session()->flash('estado','Nuevo cliente ingresado');
        return redirect()->route('clientes');

    }
}
