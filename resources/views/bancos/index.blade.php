<x-app-layout>

    @if(Session::has('estado'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('estado') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        
    @endif


    <a class="btn btn-primary" href="{{ route('bancosNuevo') }}" role="button">
        Crear nuevo banco
    </a> 

    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>
                    NOMBRE
                </td>
                <td>
                    DESCRIPCION
                </td>
                <td>
                    OPCIONES
                </td>
            </tr>

            @foreach($listado_bancos as $banco)
                <tr>
                    <td>
                        {{ $banco->nombre }}
                    </td>
                    <td>
                        {{ $banco->descripcion}}
                    </td>
                    <td>
                        <button class="btn btn-primary">editar</button>
                        <a href="{{ route('eliminarBanco',$banco->id) }}" class="btn btn-danger">eliminar</a>
                    </td>
                </tr>
            @endforeach
            
        </table>
    </div>

</x-app-layout>
