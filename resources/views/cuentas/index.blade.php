<x-app-layout>

    <div class="card">
        <div class="card-header">
            Depositos/Retiros
        </div>
        <div class="card-body">
            <form action="{{ route('guardarCuenta') }}" method="POST">
                @csrf
                <input type="hidden" name="clienteId" value="{{ $cliente->id }}"/>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Monto</label>
                  <input type="text" class="form-control" name="monto" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" value="deposito" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          DEPOSITO
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" value="retiro" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          RETIRO
                        </label>
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
        </div>
      </div>





    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>
                    TIPO
                </td>
                <td>
                    FECHA
                </td>
                <td>
                    MONTO
                </td>
            </tr>

            @foreach($cuentas as $cuenta)
                <tr>
                    <td>
                        {{ $cuenta->tipo }}
                    </td>
                    <td>
                        {{ $cuenta->created_at}}
                    </td>
                    <td>
                        {{ $cuenta->monto }}
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</x-app-layout>
