@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h2>Editar Usuario</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.update', $usuario->id_usu) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="Ficha">Ficha:</label>
        <input type="text" name="Ficha" id="Ficha" class="form-control" value="{{ old('Ficha', $usuario->Ficha) }}">
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ old('Nombre', $usuario->Nombre) }}">
    </div>
    <div class="form-group">
        <label for="Appa">Apellido Paterno:</label>
        <input type="text" name="Appa" id="Appa" class="form-control" value="{{ old('Appa', $usuario->Appa) }}">
    </div>
    <div class="form-group">
        <label for="Apma">Apellido Materno:</label>
        <input type="text" name="Apma" id="Apma" class="form-control" value="{{ old('Apma', $usuario->Apma) }}">
    </div>
    <div class="form-group">
        <label for="Nac">Fecha de Nacimiento:</label>
        <input type="date" name="Nac" id="Nac" class="form-control"
            value="{{ old('Nac', $usuario->Nac ? \Carbon\Carbon::parse($usuario->Nac)->format('Y-m-d') : '') }}">
    </div>
    <div class="form-group">
        <label for="RFC">RFC:</label>
        <input type="text" name="RFC" id="RFC" class="form-control" value="{{ old('RFC', $usuario->RFC) }}">
    </div>

    <div class="form-group">
        <label for="Fk_cat">Categoría:</label>
        <select name="Fk_cat" id="Fk_cat" class="form-control">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}" {{ old('Fk_cat', $usuario->Fk_cat) == $categoria->id_cat ? 'selected' : '' }}>
                    {{ $categoria->Categoria }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Fk_sectores">Sector:</label>
        <select name="Fk_sectores" id="Fk_sectores" class="form-control">
            @foreach ($sectores as $sector)
                <option value="{{ $sector->id_sect }}" {{ old('Fk_sectores', $usuario->Fk_sectores) == $sector->id_sect ? 'selected' : '' }}>
                    {{ $sector->Nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Correo">Correo:</label>
        <input type="email" name="Correo" id="Correo" class="form-control" value="{{ old('Correo', $usuario->Correo) }}">
        </div>

    <div class="form-group">
        <label for="Correo2">Correo de Recuperación:</label>
        <input type="email" name="Correo2" id="Correo2" class="form-control"
            value="{{ old('Correo2', $usuario->Correo2) }}">
    </div>

    <div class="form-group">
        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control"
            value="{{ old('Telefono', $usuario->Telefono) }}" pattern="\d*">
    </div>

    <div class="form-group">
        <label for="Password">Contraseña:</label>
        <input type="password" name="Password" id="Password" class="form-control">
        <small>Deja este campo vacío si no deseas cambiar la contraseña.</small>
    </div>

    <div class="form-group">
        <label for="Tiposangre">Tipo de Sangre:</label>
        <select name="Tiposangre" id="Tiposangre" class="form-control">
            <option value="A+" {{ old('Tiposangre', $usuario->Tiposangre) == 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ old('Tiposangre', $usuario->Tiposangre) == 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ old('Tiposangre', $usuario->Tiposangre) == 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ old('Tiposangre', $usuario->Tiposangre) == 'B-' ? 'selected' : '' }}>B-</option>
            <option value="O+" {{ old('Tiposangre', $usuario->Tiposangre) == 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ old('Tiposangre', $usuario->Tiposangre) == 'O-' ? 'selected' : '' }}>O-</option>
            <option value="AB+" {{ old('Tiposangre', $usuario->Tiposangre) == 'AB+' ? 'selected' : '' }}>AB+</option>
            <option value="AB-" {{ old('Tiposangre', $usuario->Tiposangre) == 'AB-' ? 'selected' : '' }}>AB-</option>
        </select>
    </div>

    <div class="form-group">
        <label for="Vacprog">Vacaciones Programadas:</label>
        <input type="date" name="Vacprog" id="Vacprog" class="form-control"
            value="{{ old('Vacprog', $usuario->Vacprog ? \Carbon\Carbon::parse($usuario->Vacprog)->format('Y-m-d') : '') }}">
    </div>

    
    <div class="form-group">
        <label for="Jornada">Jornada:</label>
        <input type="text" name="Jornada" id="Jornada" class="form-control" 
               value="{{ old('Jornada', $usuario->Jornada) }}">
    </div>


    <div class="form-group">
        <label for="Estatus">Estatus:</label>
        <select name="Estatus" id="Estatus" class="form-control">
            <option value="A" {{ old('Estatus', $usuario->Estatus) == 'A' ? 'selected' : '' }}>Activo</option>
            <option value="I" {{ old('Estatus', $usuario->Estatus) == 'I' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
</form>

<script>
    function autoResize(element) {
        element.style.height = 'auto'; // Primero reseteamos la altura
        element.style.height = (element.scrollHeight) + 'px'; // Ajustamos la altura al contenido
    }
</script>
@endsection