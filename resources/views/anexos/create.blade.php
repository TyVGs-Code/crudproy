@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear anexo</h1>

    <form action="{{ route('anexos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Permisos">Permisos: </label>
            <input type="text" name="Permisos" id="Permisos" class="form-control" required maxlength="60">
        </div>


        <div class="form-group">
            <label for="ApaMed">ApaMed: </label>
            <input type="text" name="ApaMed" id="ApaMed" class="form-control" required >
        </div>

        <div class="form-group">
            <label for="Herramienta">Herramienta: </label>
            <input type="text" name="Herramienta" id="Herramienta" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Duracion">Duracion: </label>
            <input type="text" name="Duracion" id="Duracion" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Archivo">Archivo: </label>
            <input type="text" name="Archivo" id="Archivo" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Fk_eva">Evaluacion de actividad: </label>
            <select name="Fk_eva" id="Fk_eva" class="form-control" required>
                <option value="" disabled selected>Seleccionar evaluacion de actividad</option>
                @foreach ($evaluaciones as $evaluacion)
                    <option value="{{ $evaluacion->Id_eva }}">{{ $evaluacion->NomAct }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection