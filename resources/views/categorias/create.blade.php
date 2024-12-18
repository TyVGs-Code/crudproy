@extends('layouts.app')

@section('title', 'Agregar Categoría')

@section('content')
    <h2>Agregar Nueva Categoría</h2>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Categoria">Nombre de la Categoría:</label>
            <input type="text" name="Categoria" id="Categoria" class="form-control" required maxlength="60">
        </div>
        <div class="form-group">
            <label for="Nivel">Nivel:</label>
            <input type="number" name="Nivel" id="Nivel" class="form-control" required min="1" max="45">
        </div>
        <button type="submit" class="btn btn-success mt-2">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection
