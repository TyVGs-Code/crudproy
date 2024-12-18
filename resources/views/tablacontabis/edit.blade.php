@extends('layouts.app')

@section('title', 'Editar tabla de contabilidad')

@section('content')
    <h2>Editar tabla contabilidad</h2>
    <form action="{{ route('tablacontabis.update', $tablacontabi->id_tablaconta) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="form-group">
        <label for="Fk_usu">Usuario:</label>
        <select name="Fk_usu" id="Fk_usu" class="form-control" required>
            <option value="" disabled selected>Seleccione un usuario: </option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id_usu }}" {{ old('Fk_usu', $tablacontabi->Fk_usu) == $usuario->id_usu ? 'selected' : '' }}>
                     {{ $usuario->Nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="Fk_cat">Usuario categoria?: </label>
        <select name="Fk_cat" id="Fk_cat" class="form-control" required>
            <option value="" disabled selected>Categoria del usuario: </option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->Fk_cat }}" {{ old('Fk_cat', $tablacontabi->Fk_cat) == $usuario->Fk_cat ? 'selected' : '' }}>
                     {{ $usuario->Fk_cat }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="Fk_ins">Instrucción: </label>
        <select name="Fk_ins" id="Fk_ins" class="form-control" required>
            <option value="" disabled selected>Instrucción de la tabla: </option>
            @foreach ($instrucciones as $instruccion)
                <option value="{{ $instruccion->Id_ins }}" {{ old('Fk_ins', $tablacontabi->Fk_ins) == $instruccion->Id_ins ? 'selected' : '' }}>
                     {{ $instruccion->Codigo }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <label for="FechComunic">Fecha Comunicada:</label>
            <input type="date" name="FechComunic" id="FechComunic" class="form-control" value="{{ old('FechComunic', $tablacontabi->FechComunic) }}" required>
        </div>

        <div class="form-group">
            <label for="FechCumplim">Fecha Cumplimiento:</label>
            <input type="date" name="FechCumplim" id="FechCumplim" class="form-control" value="{{ old('FechCumplim', $tablacontabi->FechCumplim) }}" required>
        </div>

        <div class="form-group">
        <label for="Fk_sect">Sector: </label>
        <select name="Fk_sect" id="Fk_sect" class="form-control" required>
            <option value="" disabled selected>Sector de la tabla: </option>
            @foreach ($sectores as $sector)
                <option value="{{ $sector->id_sect }}" {{ old('Fk_sect', $tablacontabi->Fk_sect) == $sector->id_sect ? 'selected' : '' }}>
                     {{ $sector->Nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <label for="ListaCump">Lista Cumplimiento:</label>
            <input type="text" name="ListaCump" id="ListaCump" class="form-control" value="{{ old('ListaCump', $tablacontabi->ListaCump) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="ListaCom">Lista Comunicada:</label>
            <input type="text" name="ListaCom" id="ListaCom" class="form-control" value="{{ old('ListaCom', $tablacontabi->ListaCom) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Cuestionario">Cuestionario:</label>
            <input type="text" name="Cuestionario" id="Cuestionario" class="form-control" value="{{ old('Cuestionario', $tablacontabi->Cuestionario) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Ciclo">Ciclo:</label>
            <input type="text" name="Ciclo" id="Ciclo" class="form-control" value="{{ old('Ciclo', $tablacontabi->Ciclo) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Calificacion">Calificación:</label>
            <input type="number" name="Calificacion" id="Calificacion" class="form-control" value="{{ old('Calificacion', $tablacontabi->Calificacion) }}" required min="0" max="11">
        </div>

        <div class="form-group">
            <label for="Aprobacion">Aprobación:</label>
            <input type="text" name="Aprobacion" id="Aprobacion" class="form-control" value="{{ old('Aprobacion', $tablacontabi->Aprobacion) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Observaciones">Observaciones:</label>
            <input type="text" name="Observaciones" id="Observaciones" class="form-control" value="{{ old('Observaciones', $tablacontabi->Observaciones) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Ciclo1">Ciclo 1:</label>
            <input type="text" name="Ciclo1" id="Ciclo1" class="form-control" value="{{ old('Ciclo1', $tablacontabi->Ciclo1) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Ciclo2">Ciclo 2:</label>
            <input type="text" name="Ciclo2" id="Ciclo2" class="form-control" value="{{ old('Ciclo2', $tablacontabi->Ciclo2) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="Ciclo1">Ciclo 3:</label>
            <input type="text" name="Ciclo3" id="Ciclo3" class="form-control" value="{{ old('Ciclo3', $tablacontabi->Ciclo3) }}" required maxlength="255">
        </div>

        <div class="form-group">
        <label for="Fk_evaluador">Evaluador:</label>
        <select name="Fk_evaluador" id="Fk_evaluador" class="form-control" required>
            <option value="" disabled selected>Seleccione un evaluador: </option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id_usu }}" {{ old('Fk_evaluador', $tablacontabi->Fk_evaluador) == $usuario->id_usu ? 'selected' : '' }}>
                     {{ $usuario->Nombre }}
                </option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="Fk_super">Supervisador:</label>
        <select name="Fk_super" id="Fk_super" class="form-control" required>
            <option value="" disabled selected>Seleccione un Supervisador: </option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id_usu }}" {{ old('Fk_super', $tablacontabi->Fk_super) == $usuario->id_usu ? 'selected' : '' }}>
                     {{ $usuario->Nombre }}
                </option>
            @endforeach
        </select>
        </div>


        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('tablacontabis.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>


@endsection