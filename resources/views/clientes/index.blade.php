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
                    DESPOSITOS
                </td>
                <td>
                    RETIROS
                </td>
                <td>
                    Cuenta
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
                        <a href="{{ route('cuentaRealizarDeposito',$cliente->id) }}" class="btn btn-success">
                            Realizar un deposito
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('cuenta',$cliente->id) }}" class="btn btn-warning">
                            Realizar un retiro
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('cuenta',$cliente->id) }}" class="btn btn-info">Cuentas</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</x-app-layout>
