@extends('layouts.app')

@section('title', 'Editar Sector')

@section('content')
<h2>Editar Sector</h2>
<form action="{{ route('sectores.update', $sectore->id_sect) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ old('Nombre', $sectore->Nombre) }}"
            required>
    </div>

    <div class="form-group">
        <label for="Personal_sect">Número de Personal:</label>
        <input type="number" name="Personal_sect" id="Personal_sect" class="form-control"
            value="{{ old('Personal_sect', $sectore->Personal_sect) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar Cambios</button>
    <a href="{{ route('sectores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection