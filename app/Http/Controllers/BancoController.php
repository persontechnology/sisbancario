<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    //creamos un metodo index, retorna una vista
    public function index()
    {
        $data = array('listado_bancos' => Banco::all() );
        return view('bancos.index',$data);
    }
    public function nuevo()
    {
        return view('bancos.nuevo');
    }

    //David,metodo para recibir datos del formulario y almacenar en bbdd 27/08/2021
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:bancos|max:255',
            'descripcion' => 'nullable|max:255',
        ]);

        //recibir datos y almacenamos en variables
        $nombre=$request->nombre;
        $desc=$request->descripcion;

        //conexion con modelo Banco de bbdd
        $banco=new Banco();
        $banco->nombre=$nombre;
        $banco->descripcion=$desc;
        $banco->save();

        //redireccionamos a la ruta de bancos listado
        $request->session()->flash('estado', 'Banco ingresado exitosamente');
        return redirect()->route('bancos');

    }

    public function eliminar($id)
    {
        $banco=Banco::find($id);
        return view('bancos.eliminar',['banco'=>$banco]);
    }
    public function destruir(Request $request, $id)
    {
        Banco::destroy($id);
        $request->session()->flash('estado', 'Banco eliminado exitosamente');
        return redirect()->route('bancos');
    }


    //David: metodo para editar banco , recibe un parametro de entrad que es el id
    public function editar($id)
    {
        $sql_banco=Banco::find($id);
        return view('bancos.editar',['banco'=>$sql_banco]);
    }

    public function actualizar(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:255|unique:bancos,nombre,'.$request->id,
            'descripcion' => 'nullable|max:255',
        ]);

        $banco=Banco::find($request->id);
        $banco->nombre=$request->nombre;
        $banco->descripcion=$request->descripcion;
        $banco->save();
        $request->session()->flash('estado', 'Banco actualizado exitosamente');
        return redirect()->route('bancos');

    }


    // funcion para ver el listado de clientes de cada banco
    public function listadoClientes($idBanco)
    {
        $banco=Banco::find($idBanco);
        $data = array('listado_clientes' =>$banco->usuarios );
        return view('bancos.listadoClientes',$data);
    }

}
