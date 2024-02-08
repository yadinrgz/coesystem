@extends('layouts.admin')

@section('page-title')
    {{ __('Create Catalogo') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.catalogo') }}">{{ __('Catalogo') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection



@section('content')
<div class="container">
        <h2>Crea un nuevo elemento en el catálogo</h2>

        <form method="post" action="{{ route('catalogo.store') }}">
            @csrf

            <!-- Agrega los campos del formulario según tus necesidades -->
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" class="form-control">
            </div>

            <!-- Otros campos del formulario -->

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
