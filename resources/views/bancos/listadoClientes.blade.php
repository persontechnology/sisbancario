<x-app-layout>

    <a class="btn btn-primary" href="{{ route('clienteNuevo') }}" role="button">
        Crear nuevo cliente
    </a>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>
                    NOMBRES
                </td>
                <td>
                    APELLIDOS
                </td>
                <td>
                    EMAIL
                </td>
                <td>
                    CEDULA
                </td>
                <td>
                    BANCO
                </td>
                <td>
                    TAREA
                </td>

            </tr>

            @foreach($listado_clientes as $cliente)
                <tr>
                    <td>
                        {{ $cliente->nombres }}
                    </td>
                    <td>
                        {{ $cliente->apellidos}}
                    </td>
                    <td>
                        {{ $cliente->email }}
                    </td>
                    <td>
                        {{ $cliente->cedula }}
                    </td>
                    <td>
                        @if($cliente->banco)
                                {{ $cliente->banco->nombre }}
                        @endif
                    </td>
                    <td>
                        realizar el editar y el eliminar con validacion
                        <li>email correcto</li>
                        <li>cedula ecuatoriana</li>
                        <li>select y radio mostrar el valor antiguo</li>
                        <li>mehorar la interfaz</li>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</x-app-layout>
