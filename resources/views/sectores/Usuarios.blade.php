@extends('layouts.app')

@section('title', 'Usuarios del Sector')

@section('content')
<h2>Usuarios del Sector: {{ $sector->Nombre }}</h2>

@if ($usuarios->isEmpty())
    <p>No hay usuarios asignados a este sector.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id_usu }}</td>
                    <td>{{ $usuario->Nombre }}</td>
                    <td>{{ $usuario->Correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('sectores.index') }}" class="btn btn-secondary mt-2">Volver a la lista de sectores</a>
@endsection