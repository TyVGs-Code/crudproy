@extends('layouts.app')

@section('content')
    <h1>Lista de tablas de contabilidad</h1>
    <a href="{{ route('tablacontabis.create') }}" class="btn btn-primary mb-3">Crear tabla de contabilidad</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Categoria del usuario</th>
                <th>Instruccion</th>
                <th>Fecha comunicada</th>
                <th>Fecha cumplimiento</th>
                <th>Sector</th>
                <th>Lista cumplimiento</th>
                <th>Lista comunicada</th>
                <th>Cuestionario</th>
                <th>Ciclo</th>
                <th>Calificacion</th>
                <th>Aprovacion</th>
                <th>Observaciones</th>
                <th>Ciclo 1</th>
                <th>Ciclo 2</th>
                <th>Ciclo 3</th>
                <th>Evaluador</th>
                <th>Supervisador</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tablacontabis as $tablacontabi)
            <tr>
                <td>{{ $tablacontabi->id_tablaconta }}</td>
                <td>{{ $tablacontabi->usuario->Nombre ?? 'No definido' }}</td>
                <td>{{ $tablacontabi->categoria->Fk_cat ?? 'N/A' }}</td>
                <td>{{ $tablacontabi->instruccione->Codigo ?? 'N/A' }}</td>
                <td>{{ $tablacontabi->FechComunic }}</td>
                <td>{{ $tablacontabi->FechCumplim ?? 'N/A' }}</td>
                <td>{{ $tablacontabi->sectores->Nombre ?? 'N/A' }}</td>
                <td>{{ $tablacontabi->ListaCump }}</td>
                <td>{{ $tablacontabi->ListaCom }}</td>
                <td>{{ $tablacontabi->Cuestionario }}</td>
                <td>{{ $tablacontabi->Ciclo }}</td>
                <td>{{ $tablacontabi->Calificacion }}</td>
                <td>{{ $tablacontabi->Aprobacion }}</td>
                <td>{{ $tablacontabi->Observaciones }}</td>
                <td>{{ $tablacontabi->Ciclo1 }}</td>
                <td>{{ $tablacontabi->Ciclo2 }}</td>
                <td>{{ $tablacontabi->Ciclo3 }}</td>
                <td>{{ $tablacontabi->supervisador->Nombre ?? 'N/A' }}</td>
                <td>{{ $tablacontabi->evaluador->Nombre ?? 'N/A' }}</td>

                <td>
                    <a href="{{ route('tablacontabis.edit', $tablacontabi) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tablacontabis.destroy', $tablacontabi) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection