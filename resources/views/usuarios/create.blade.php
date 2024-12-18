@extends('layouts.app')

@section('title', 'Agregar Usuario')

@section('content')
<h2 class="text-center mb-4 text-primary">Agregar Nuevo Usuario</h2>

{{-- Muestra de errores --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Por favor corrige los errores:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Ficha">Ficha:</label>
        <input type="text" name="Ficha" id="Ficha" class="form-control" value="{{ old('Ficha') }}" required>
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
    </div>
    <div class="form-group">
        <label for="Appa">Apellido Paterno:</label>
        <input type="text" name="Appa" id="Appa" class="form-control" value="{{ old('Appa') }}" required>
    </div>
    <div class="form-group">
        <label for="Apma">Apellido Materno:</label>
        <input type="text" name="Apma" id="Apma" class="form-control" value="{{ old('Apma') }}" required>
    </div>
    <div class="form-group">
        <label for="Nac">Fecha de Nacimiento:</label>
        <input type="date" name="Nac" id="Nac" class="form-control" value="{{ old('Nac') }}" required>
    </div>
    <div class="form-group">
        <label for="RFC">RFC:</label>
        <input type="text" name="RFC" id="RFC" class="form-control" value="{{ old('RFC') }}" required minlength="12">
    </div>
    <div class="form-group">
        <label for="Fk_cat">Categoría:</label>
        <select name="Fk_cat" id="Fk_cat" class="form-control" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}" {{ old('Fk_cat') == $categoria->id_cat ? 'selected' : '' }}>
                    {{ $categoria->Categoria }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Fk_sectores">Sector:</label>
        <select name="Fk_sectores" id="Fk_sectores" class="form-control" required>
            @foreach ($sectores as $sector)
                <option value="{{ $sector->id_sect }}" {{ old('Fk_sectores') == $sector->id_sect ? 'selected' : '' }}>
                    {{ $sector->Nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Correo">Correo:</label>
        <input type="email" name="Correo" id="Correo" class="form-control" value="{{ old('Correo') }}" required>
    </div>
    <div class="form-group">
        <label for="Correo2">Correo De Recuperación:</label>
        <input type="email" name="Correo2" id="Correo2" class="form-control" value="{{ old('Correo2') }}">
    </div>
    <div class="form-group">
        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ old('Telefono') }}" required
            pattern="\d*">
    </div>
    <div class="form-group">
        <label for="Password">Contraseña:</label>
        <input type="password" name="Password" id="Password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Tiposangre">Tipo de Sangre:</label>
        <select name="Tiposangre" id="Tiposangre" class="form-control" required>
            @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $tipo)
                <option value="{{ $tipo }}" {{ old('Tiposangre') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Vacofic">Vacaciones Oficiales:</label>
        <input type="date" name="Vacofic" id="Vacofic" class="form-control" value="{{ old('Vacofic') }}" required>
    </div>
    <div class="form-group">
        <label for="Vacprog">Vacaciones Programadas:</label>
        <input type="date" name="Vacprog" id="Vacprog" class="form-control" value="{{ old('Vacprog') }}" required>
    </div>
    <div class="form-group">
        <label for="Jornada">Jornada:</label>
        <input type="number" name="Jornada" id="Jornada" class="form-control" value="{{ old('Jornada') }}" required
            min="0" max="9" step="1">
    </div>
    <div class="form-group">
        <label for="Camisa">Camisa:</label>
        <select name="Camisa" id="Camisa" class="form-control" required>
            @foreach (['S', 'M', 'L', 'XL'] as $talla)
                <option value="{{ $talla }}" {{ old('Camisa') == $talla ? 'selected' : '' }}>{{ $talla }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Pantalon">Pantalón:</label>
        <select name="Pantalon" id="Pantalon" class="form-control" required>
            @foreach ([28, 30, 32, 34] as $talla)
                <option value="{{ $talla }}" {{ old('Pantalon') == $talla ? 'selected' : '' }}>{{ $talla }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Zapatos">Zapatos:</label>
        <select name="Zapatos" id="Zapatos" class="form-control" required>
            @foreach ([6, 7, 8, 9] as $talla)
                <option value="{{ $talla }}" {{ old('Zapatos') == $talla ? 'selected' : '' }}>{{ $talla }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Condmedica">Condición Médica:</label>
        <textarea name="Condmedica" id="Condmedica" class="form-control" rows="3">{{ old('Condmedica') }}</textarea>
    </div>
    <div class="form-group">
        <label for="Estatus">Estatus:</label>
        <select name="Estatus" id="Estatus" class="form-control" required>
            <option value="A" {{ old('Estatus') == 'A' ? 'selected' : '' }}>Activo</option>
            <option value="I" {{ old('Estatus') == 'I' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear Usuario</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
</form>
@endsection