<x-app-layout>
    <h2>Complete el formulario para registrar nuevo Cliente</h2>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('guardarCliente') }}">

                @csrf

                <div class="mb-3">
                  <label for="nombres" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="nombres" name="nombres" value="{{old('nombres')}}" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Ej. Luis Jose</div>
                </div>

                <div class="mb-3">
                  <label for="apellidos" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" value="{{ old('apellidos') }}" name="apellidos">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email">
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" value="{{ old('cedula') }}" name="cedula">
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="banco_select">

                        <option value="" selected>Selecion un Banco</option>

                        @foreach ($bancos as $banco)
                            <option value="{{ $banco->id }}">
                                {{ $banco->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="banco-radio" value="" id="banco0">
                        <label class="form-check-label" for="banco0">
                            SIN BANCO
                        </label>
                    </div>
                    @foreach ($bancos as $banco)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="banco_radio" value="{{ $banco->id }}" id="banco{{ $banco->id }}">
                            <label class="form-check-label" for="banco{{ $banco->id }}">
                            {{ $banco->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>


                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-danger" href="{{ route('bancos') }}">CANCELAR</a>

            </form>

        </div>
    </div>
</x-app-layout>
