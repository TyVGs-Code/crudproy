@extends('layouts.app')

@section('title', 'Agregar Sector')

@section('content')
    <h2>Agregar Nuevo Sector</h2>
    <form action="{{ route('sectores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre del Sector:</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" required maxlength="60">
        </div>
        <div class="form-group">
            <label for="Personal_sect">Personal del Sector:</label>
            <input type="number" name="Personal_sect" id="Personal_sect" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Guardar</button>
        <a href="{{ route('sectores.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection
