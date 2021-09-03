<x-app-layout>

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

                        <a href="{{route('listadoClientesBanco',$banco->id)}}" class="btn btn-dark">
                            <i class="fas fa-users"></i>
                        </a>


                        <a href="{{route('editarBanco',$banco->id)}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('eliminarBanco',$banco->id) }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</x-app-layout>
