@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de anexos</h1>
    <a href="{{ route('anexos.create') }}" class="btn btn-primary">Crear Anexo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Permisos</th>
                <th>ApaMed</th>
                <th>Herramienta</th>
                <th>Duracion</th>
                <th>Archivo</th>
                <th>Evaluacion de actividad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anexo as $anexos)
            <tr>
                <td>{{ $anexos->Id_ane }}</td>
                <td>{{ $anexos->Permisos }}</td>
                <td>{{ $anexos->ApaMed }}</td>
                <td>{{ $anexos->Herramienta }}</td>
                <td>{{ $anexos->Duracion }}</td>
                <td>{{ $anexos->Archivo }}</td>
                <td>{{ $anexos->Fk_eva }}</td>
                <td>
                    <!-- <a href="{{ route('anexos.show', $anexos->Id_ane) }}" class="btn btn-info btn-sm">Ver</a> -->
                    <a href="{{ route('anexos.edit', $anexos->Id_ane) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('anexos.destroy', $anexos->Id_ane) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection