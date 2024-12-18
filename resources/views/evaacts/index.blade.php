@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Actividades</h1>
    <a href="{{ route('evaacts.create') }}" class="btn btn-primary">Crear Actividad</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Clasificación</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaacts as $evaact)
            <tr>
                <td>{{ $evaact->Id_eva }}</td>
                <td>{{ $evaact->NomAct }}</td>
                <td>{{ $evaact->Fecha }}</td>
                <td>{{ $evaact->Clasificacion }}</td>
                <td>{{ $evaact->Tipo }}</td>
                <td>
                    <a href="{{ route('evaacts.show', $evaact->Id_eva) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('evaacts.edit', $evaact->Id_eva) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('evaacts.destroy', $evaact->Id_eva) }}" method="POST" style="display:inline;">
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