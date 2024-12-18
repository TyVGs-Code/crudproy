@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
    <h2>Lista de Categorías</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-2">Agregar Nueva Categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nivel</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id_cat }}</td>
                    <td>{{ $categoria->Categoria }}</td>
                    <td>{{ $categoria->Nivel }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id_cat) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id_cat) }}" method="POST" style="display:inline;">
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
