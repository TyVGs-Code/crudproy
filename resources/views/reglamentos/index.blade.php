@extends('layouts.app')

@section('title', 'Lista de Reglamentos')

@section('content')
    <h2>Lista de Reglamentos</h2>
    <a href="{{ route('reglamentos.create') }}" class="btn btn-primary mb-2">Agregar Nuevo Reglamento</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Origen</th>
                <th>Obligación</th>
                <th>Tipo</th>
                <th>Categorías</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reglamentos as $reglamento)
                <tr>
                    <td>{{ $reglamento->id_regl }}</td>
                    <td>{{ $reglamento->origen }}</td>
                    <td>{{ $reglamento->obligacion }}</td>
                    <td>{{ $reglamento->tipo }}</td>
                    <td>{{ $reglamento->categoriasNombres ?? 'Sin Categoría' }}</td>
                    <td>
                        <a href="{{ route('reglamentos.edit', $reglamento->id_regl) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reglamentos.destroy', $reglamento->id_regl) }}" method="POST" style="display:inline;">
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