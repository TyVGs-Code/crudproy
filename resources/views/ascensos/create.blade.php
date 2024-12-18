@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ascenso</h1>

    <form action="{{ route('ascensos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Fk_ascendido">Ascendido</label>
            <select name="Fk_ascendido" id="Fk_ascendido" class="form-control" onchange="updateVacantes()">
                <option value="" disabled selected>Seleccionar nombre</option>  <!-- Placeholder para ascendido -->
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fk_vacante">Vacante</label>
            <select name="Fk_vacante" id="Fk_vacante" class="form-control">
                <option value="" disabled selected>Seleccionar nombre</option>  <!-- Placeholder para vacante -->
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}">{{ $usuario->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fechainicio">Fecha Inicio</label>
            <input type="date" name="Fechainicio" id="Fechainicio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Fechafin">Fecha Fin</label>
            <input type="date" name="Fechafin" id="Fechafin" class="form-control">
        </div>
        <div class="form-group">
            <label for="estatus">Estatus</label>
            <select name="estatus" id="estatus" class="form-control" required>
                <option value="Activo" class="text-success">Activo</option>
                <option value="Inactivo" class="text-danger">Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

<script>
    function updateVacantes() {
        var selectedAscendido = document.getElementById('Fk_ascendido').value;
        var vacantesSelect = document.getElementById('Fk_vacante');
        
        // Recorremos las opciones del select de vacantes
        for (var i = 0; i < vacantesSelect.options.length; i++) {
            var option = vacantesSelect.options[i];
            
            // Si el valor de la opción es igual al seleccionado en el ascendido, lo deshabilitamos
            if (option.value == selectedAscendido) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        }
    }

    // Llamar a la función al cargar la página para inicializar el estado de los campos
    document.addEventListener("DOMContentLoaded", function() {
        updateVacantes();
    });
</script>

@endsection
