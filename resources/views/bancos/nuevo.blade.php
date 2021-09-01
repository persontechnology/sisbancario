<x-app-layout>
    <h2>Complete el formulario para registrar nuevo Banco</h2>
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('guardarBanco') }}">
                
                @csrf

                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Ej. Banco Guayaquil</div>
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" value="{{ old('descripcion') }}" name="descripcion">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-danger" href="{{ route('bancos') }}">CANCELAR</a>

            </form>

        </div>
    </div>
</x-app-layout>