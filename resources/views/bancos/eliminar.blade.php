<x-app-layout>

    <h1>CONFIRMAR ELIMINACIÓN DEL REGISTRO</h1>
    <h2>{{ $banco->nombre }}</h2>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Warning.svg/2219px-Warning.svg.png" class="img-fluid" width="150" alt="">
    <a href="{{ route('destruirBanco',$banco->id) }}" class="btn btn-success">Confirmar</a>
    <a href="{{ route('bancos') }}" class="btn btn-danger">Cancelar</a>
<style>
    
</style>
</x-app-layout>