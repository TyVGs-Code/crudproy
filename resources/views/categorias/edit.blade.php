@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h2>Editar Categoría</h2>
    <form action="{{ route('categorias.update', $categoria->id_cat) }}" method="POST">
        @csrf
        @method('PUT') <!-- Esto es necesario para indicar que estamos haciendo una actualización -->
        <div class="form-group">
            <label for="Categoria">Nombre de la Categoría:</label>
            <input type="text" name="Categoria" id="Categoria" class="form-control" value="{{ old('Categoria', $categoria->Categoria) }}" required maxlength="60">
        </div>
        <div class="form-group">
            <label for="Nivel">Nivel:</label>
            <input type="number" name="Nivel" id="Nivel" class="form-control" required min="1" max="45">
        </div>
        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection
