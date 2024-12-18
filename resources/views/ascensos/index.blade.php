@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ascensos</h1>
    <a href="{{ route('ascensos.create') }}" class="btn btn-primary mb-3">Crear Ascenso</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ascendido</th>
                <th>Vacante</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ascensos as $ascenso)
            <tr>
                <td>{{ $ascenso->id_ase }}</td>
                <td>{{ $ascenso->ascendido->Nombre ?? 'No definido' }}</td>
                <!-- Mostrar el nombre de la vacante -->
                <td>{{ $ascenso->vacante->Nombre ?? 'N/A' }}</td>
                <td>{{ $ascenso->Fechainicio }}</td>
                <td>{{ $ascenso->Fechafin ?? 'N/A' }}</td>
                <td>
                    @if($ascenso->estatus == 'Activo')
                        <span class="text-success">{{ $ascenso->estatus }}</span>
                    @else
                        <span class="text-danger">{{ $ascenso->estatus }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('ascensos.edit', $ascenso) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ascensos.destroy', $ascenso) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
