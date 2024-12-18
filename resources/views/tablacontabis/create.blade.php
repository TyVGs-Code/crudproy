@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear tabla de contabilidad</h1>

    <form action="{{ route('tablacontabis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Fk_usu">Usuario: </label>
            <select name="Fk_usu" id="Fk_usu" class="form-control" required>
                <option value="" disabled selected>Seleccionar usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_cat">Categoria del usuario?: </label>
            <select name="Fk_cat" id="Fk_cat" class="form-control" required>
                <option value="" disabled selected>Categoria del usuario?</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Fk_cat }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_ins">Instrucciones: </label>
            <select name="Fk_ins" id="Fk_ins" class="form-control" required>
                <option value="" disabled selected>Instruccion a elegir</option>
                @foreach ($instrucciones as $instruccion)
                    <option value="{{ $instruccion->Id_ins }}">{{ $instruccion->Codigo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="FechComunic">Fecha comunicada: </label>
            <input type="date" name="FechComunic" id="FechComunic" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="FechCumplim">Fecha cumplimiento: </label>
            <input type="date" name="FechCumplim" id="FechCumplim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Fk_sect">Sectores: </label>
            <select name="Fk_sect" id="Fk_sect" class="form-control" required>
                <option value="" disabled selected>Sector a elegir</option>
                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id_sect }}">{{ $sector->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ListaCump">Lista de cumplimiento?: </label>
            <input type="text" name="ListaCump" id="ListaCump" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="ListaCom">Lista comunicada?: </label>
            <input type="text" name="ListaCom" id="ListaCom" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Cuestionario">Cuestionario: </label>
            <input type="text" name="Cuestionario" id="Cuestionario" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Ciclo">Ciclo: </label>
            <input type="text" name="Ciclo" id="Ciclo" class="form-control" required maxlength="60">
        </div>


        <div class="form-group">
            <label for="Calificacion">Calificación: </label>
            <input type="number" name="Calificacion" id="Calificacion" class="form-control" required min="0" max="10">
        </div>

        <div class="form-group">
            <label for="Aprobacion">Aprobación: </label>
            <input type="text" name="Aprobacion" id="Aprobacion" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Observaciones">Observaciones: </label>
            <input type="text" name="Observaciones" id="Observaciones" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Ciclo1">Ciclo 1: </label>
            <input type="text" name="Ciclo1" id="Ciclo1" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Ciclo2">Ciclo 2: </label>
            <input type="text" name="Ciclo2" id="Ciclo2" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Ciclo3">Ciclo 3: </label>
            <input type="text" name="Ciclo3" id="Ciclo3" class="form-control" required maxlength="60">
        </div>

        <div class="form-group">
            <label for="Fk_evaluador">Evaluador: </label>
            <select name="Fk_evaluador" id="Fk_evaluador" class="form-control" required>
                <option value="" disabled selected>Seleccionar evaluador</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_super">Supervisador: </label>
            <select name="Fk_super" id="Fk_super" class="form-control" required>
                <option value="" disabled selected>Seleccionar supervisador</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection