@extends('layouts.app')

@section('content')
<h1>Editar Marca</h1>

<form action="{{ route('marcas.update', $marca) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre de la Marca</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $marca->nombre }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
