@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Actividad</h1>
    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $evaact->Id_eva }}</td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td>{{ $evaact->NomAct }}</td>
        </tr>
        <tr>
            <th>Fecha:</th>
            <td>{{ $evaact->Fecha }}</td>
        </tr>
        <tr>
            <th>Clasificación:</th>
            <td>{{ $evaact->Clasificacion }}</td>
        </tr>
        <tr>
            <th>Tipo:</th>
            <td>{{ $evaact->Tipo }}</td>
        </tr>
        <tr>
            <th>Frecuencia:</th>
            <td>{{ $evaact->Frecuencia }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $evaact->Status }}</td>
        </tr>
        <tr>
            <th>Archivo:</th>
            <td>
                @if ($evaact->Archivo)
                <a href="{{ asset('storage/' . $evaact->Archivo) }}" target="_blank">Ver archivo</a>
                @else
                No disponible
                @endif
            </td>
        </tr>
    </table>
    <a href="{{ route('evaacts.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection