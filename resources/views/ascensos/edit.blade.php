@extends('layouts.app')

@section('title', 'Editar Ascenso')

@section('content')
    <h2>Editar Ascenso</h2>
    <form action="{{ route('ascensos.update', $ascenso->id_ase) }}" method="POST">
        @csrf
        @method('PUT') <!-- Esto es necesario para indicar que estamos haciendo una actualización -->
        
        <div class="form-group">
            <label for="Fk_ascendido">Ascendido:</label>
            <select name="Fk_ascendido" id="Fk_ascendido" class="form-control" onchange="updateVacantes()" required>
                <option value="" disabled selected>Seleccionar Ascendido</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}" 
                        {{ old('Fk_ascendido', $ascenso->Fk_ascendido) == $usuario->id_usu ? 'selected' : '' }}>
                        {{ $usuario->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_vacante">Vacante:</label>
            <select name="Fk_vacante" id="Fk_vacante" class="form-control">
                <option value="" disabled selected>Seleccionar Vacante</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id_usu }}" 
                        {{ old('Fk_vacante', $ascenso->Fk_vacante) == $usuario->id_usu ? 'selected' : '' }}
                        class="vacante-option">
                        {{ $usuario->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fechainicio">Fecha Inicio:</label>
            <input type="date" name="Fechainicio" id="Fechainicio" class="form-control" value="{{ old('Fechainicio', $ascenso->Fechainicio) }}" required>
        </div>

        <div class="form-group">
            <label for="Fechafin">Fecha Fin:</label>
            <input type="date" name="Fechafin" id="Fechafin" class="form-control" value="{{ old('Fechafin', $ascenso->Fechafin) }}">
        </div>

        <div class="form-group">
            <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus" class="form-control" required>
                <option value="Activo" {{ old('estatus', $ascenso->estatus) == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estatus', $ascenso->estatus) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('ascensos.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>

    <script>
        function updateVacantes() {
            var selectedAscendido = document.getElementById('Fk_ascendido').value;
            var vacantesSelect = document.getElementById('Fk_vacante');
            
            // Recorremos todas las opciones del select de vacantes
            for (var i = 0; i < vacantesSelect.options.length; i++) {
                var option = vacantesSelect.options[i];
                
                // Si el valor de la opción es igual al seleccionado en el ascendido, lo deshabilitamos
                if (option.value == selectedAscendido) {
                    option.disabled = true;
                    option.style.color = 'red'; // Cambiar color a rojo para las vacantes no disponibles
                } else {
                    option.disabled = false;
                    option.style.color = ''; // Restaurar color
                }
            }
        }

        // Llamar a la función al cargar la página para inicializar el estado de los campos
        document.addEventListener("DOMContentLoaded", function() {
            updateVacantes();
        });
    </script>

@endsection
