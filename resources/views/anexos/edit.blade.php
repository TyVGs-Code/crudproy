@extends('layouts.app')

@section('title', 'Editar anexo')

@section('content')
    <h2>Editar anexo</h2>
    <form action="{{ route('anexos.update', $anexo->Id_ane) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Permisos">Permisos:</label>
            <input type="text" name="Permisos" id="Permisos" class="form-control" value="{{ old('Permisos', $anexo->Permisos) }}" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="ApaMed">ApaMed?:</label>
            <input type="text" name="ApaMed" id="ApaMed" class="form-control" value="{{ old('ApaMed', $anexo->ApaMed) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Herramienta">Herramienta:</label>
            <input type="text" name="Herramienta" id="Herramienta" class="form-control" value="{{ old('Herramienta', $anexo->Herramienta) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Duracion">Duración:</label>
            <input type="text" name="Duracion" id="Duracion" class="form-control" value="{{ old('Duracion', $anexo->Duracion) }}" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Archivo">Archivo:</label>
            <input type="text" name="Archivo" id="Archivo" class="form-control" value="{{ old('Archivo', $anexo->Archivo) }}" required maxlength="60">
        </div>

        <div class="form-group">
        <label for="Fk_eva">Evaluacion:</label>
        <select name="Fk_eva" id="Fk_eva" class="form-control" required>
            <option value="" disabled selected>Seleccione una evaluación: </option>
            @foreach ($evaluaciones as $evaluacion)
                <option value="{{ $evaluacion->Id_eva }}" {{ old('Fk_eva', $anexo->Fk_eva) == $evaluacion->Id_eva ? 'selected' : '' }}>
                     {{ $evaluacion->NomAct }}
                </option>
            @endforeach
        </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('anexos.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>


@endsection