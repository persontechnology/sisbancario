<x-app-layout>
    <h2>Complete el formulario para actualizar {{$banco->nombre}}</h2>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('actualizarBanco') }}">
                
                @csrf
                
                <input type="hidden" name="id" value="{{$banco->id}}" />

                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$banco->nombre)}}" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Ej. Banco Guayaquil</div>
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" value="{{ old('descripcion',$banco->descripcion) }}" name="descripcion">
                </div>

                <button type="submit" class="btn btn-success">ACTUALIZAR</button>
                <a class="btn btn-danger" href="{{ route('bancos') }}">CANCELAR</a>

            </form>

        </div>
    </div>
</x-app-layout>