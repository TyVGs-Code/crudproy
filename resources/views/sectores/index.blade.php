@extends('layouts.app')

@section('title', 'Lista de Sectores')

@section('content')
<h2>Lista de Sectores</h2>
<a href="{{ route('sectores.create') }}" class="btn btn-primary mb-2">Agregar Nuevo Sector</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>N° Personal</th>
            <th>Usuarios</th> <!-- Nueva columna -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sectores as $sector)
            <tr>
                <td>{{ $sector->id_sect }}</td>
                <td>{{ $sector->Nombre }}</td>
                <td>{{ $sector->usuarios->count() }}</td> <!-- Contamos los usuarios asociados -->
                <td>
                    <!-- Ícono que redirige a los usuarios del sector -->
                    <a href="{{ route('sectores.usuarios', $sector->id_sect) }}" class="btn btn-info btn-sm"
                        title="Ver Usuarios">
                        <i class="fas fa-users"></i> <!-- Ícono de usuarios -->
                    </a>
                </td>
                <td>
                    <a href="{{ route('sectores.edit', $sector->id_sect) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('sectores.destroy', $sector->id_sect) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection