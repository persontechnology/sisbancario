<x-app-layout>

    <div class="card">
        <div class="card-header">
            Depositos
        </div>
        <div class="card-body">
            <form action="{{ route('guardarCuentaDeposito') }}" method="POST">
                @csrf
                <input type="hidden" name="clienteId" value="{{ $cliente->id }}"/>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Monto</label>
                  <input type="text" class="form-control" name="monto" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
        </div>
      </div>





    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>
                    FECHA
                </td>
                <td>
                    TIPO
                </td>
                <td>
                    VALOR
                </td>
                <td>
                    MONTO
                </td>
            </tr>

            @foreach($cuentas as $cuenta)
                <tr>
                    <td>
                        {{ $cuenta->created_at}}
                    </td>
                    <td>
                        <strong class="bg-{{ $cuenta->tipo=='deposito'?'success':'warning' }}">{{ $cuenta->tipo }}</strong>
                    </td>
                    <td>
                        {{ $cuenta->valor}}
                    </td>
                    <td>
                        {{ $cuenta->monto }}
                    </td>
                </tr>
                
            @endforeach

        </table>
    </div>

</x-app-layout>
