@extends('layouts.app')

@section('title', 'Agregar Reglamento')

@section('content')
<h2>Agregar Nuevo Reglamento</h2>
<form action="{{ route('reglamentos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="origen">Origen:</label>
        <input type="text" name="origen" id="origen" class="form-control" required maxlength="60"
            value="{{ old('origen') }}">
    </div>
    <div class="form-group">
        <label for="obligacion">Obligación:</label>
        <input type="text" name="obligacion" id="obligacion" class="form-control" required maxlength="100"
            value="{{ old('obligacion') }}">
    </div>
    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" class="form-control" required maxlength="20" value="{{ old('tipo') }}">
    </div>
    <div class="form-group">
        <label for="Fk_cat">Categorías:</label>
        <select name="Fk_cat[]" id="Fk_cat" class="form-control" multiple required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}">{{ $categoria->Categoria }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-2">Guardar</button>
    <a href="{{ route('reglamentos.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
</form>
@endsection