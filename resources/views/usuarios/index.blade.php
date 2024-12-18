@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Lista de Usuarios</h1>

    <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Agregar Usuario</a>
    <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#selectAttributesModal">Exportar a PDF</a>

    <div class="modal fade" id="selectAttributesModal" tabindex="-1" aria-labelledby="selectAttributesModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg rounded">
                <div class="modal-header border-0 pb-2">
                    <h5 class="modal-title text-primary" id="selectAttributesModalLabel">Selecciona los Atributos a
                        Exportar</h5>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="pdfForm" action="{{ route('usuarios.exportPdf') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted mb-4">Selecciona los atributos que deseas exportar en el archivo
                                    PDF.</p>
                            </div>
                            @foreach (['id_usu' => 'N°', 'Ficha' => 'Ficha', 'Nombre' => 'Nombre', 'Appa' => 'Apellido Paterno', 'Apma' => 'Apellido Materno', 'Vacofic' => 'Vacaciones Oficiales', 'Vacprog' => 'Vacaciones Programadas', 'Jornada' => 'Jornada', 'Estatus' => 'Estatus'] as $value => $label)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-check custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" value="{{ $value }}"
                                            id="{{ $value }}" name="attributes[]">
                                        <label class="form-check-label" for="{{ $value }}">{{ $label }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
                <div class="modal-footer border-0 pt-2">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-lg">Descargar PDF</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow">
            <thead class="bg-primary text-white">
                <tr>
                    <th>N°</th>
                    <th>Ficha</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    {{-- <th>Fecha de Nacimiento</th> --}}
                    {{-- <th>RFC</th> --}}
                    {{-- <th>Correo</th> --}}
                    {{-- <th>Teléfono</th> --}}
                    {{-- <th>Tipo de Sangre</th> --}}
                    <th>Vacaciones Oficiales</th>
                    <th>Vacaciones Programadas</th>
                    <th>Jornada</th>
                    {{-- <th>Camisa</th> --}}
                    {{-- <th>Pantalón</th> --}}
                    {{-- <th>Zapatos</th> --}}
                    {{-- <th>Condición Médica</th> --}}
                    <th class="text-center">Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id_usu }}</td>
                                <td>{{ $usuario->Ficha }}</td>
                                <td>{{ $usuario->Nombre }}</td>
                                <td>{{ $usuario->Appa }}</td>
                                <td>{{ $usuario->Apma }}</td>
                                <td>{{ date('d/m/Y', strtotime($usuario->Vacofic)) }}</td>
                                <td class="{{ 
                                strtotime($usuario->Vacprog) > strtotime(now()) ? 'text-primary font-weight-bold' :
                    (strtotime($usuario->Vacprog) < strtotime(now()) ? 'text-warning font-weight-bold' : '') 
                            }}">
                                    {{ date('d/m/Y', strtotime($usuario->Vacprog)) }}
                                </td>
                                <td>
                                    @if(is_numeric($usuario->Jornada) && $usuario->Jornada >= 0 && $usuario->Jornada <= 9)
                                        {{ $usuario->Jornada }}
                                    @else
                                        <span class="text-danger font-weight-bold">Inválido</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span
                                        class="badge badge-pill
                                            {{ strtolower(trim($usuario->Estatus)) === 'activo' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $usuario->Estatus }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('usuarios.edit', $usuario->id_usu) }}"
                                            class="btn btn-warning btn-sm mb-1 shadow-sm">Editar</a>
                                        <form action="{{ route('usuarios.destroy', $usuario->id_usu) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<style>
    /* Estilo de la tabla */
    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }

    /* Efecto de hover para las filas de la tabla */
    .table-hover tbody tr:hover {
        background-color: #f0f8ff;
        transition: background-color 0.3s;
    }

    /* Botones con sombra */
    .btn {
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem;
        border-radius: 5px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);
    }

    /* Estilo para la tabla */
    .table {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    /* Sombras para la tabla */
    .shadow {
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
    }

    /* Estilo para el estatus */
    .badge-pill {
        font-size: 0.85rem;
        padding: 0.4em 0.8em;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
    }

    .badge-danger {
        background-color: #dc3545;
        color: white;
    }

    /* Estilo de los checkboxes dentro de la modal */
    .form-check-label {
        font-weight: 500;
        padding-left: 10px;
        /* Espaciado cómodo para la etiqueta */
        display: flex;
        align-items: center;
        /* Alineación vertical para que checkbox y texto estén centrados */
    }

    .form-check-input {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        /* Espaciado entre checkbox y etiqueta */
        transition: all 0.3s ease;
        /* Transición suave al marcar */
    }

    /* Color de fondo y borde del checkbox cuando está marcado */
    .form-check-input:checked {
        background-color: #007bff;
        /* Color azul cuando está marcado */
        border-color: #007bff;
        /* Bordes del checkbox en azul */
    }

    /* Cambio de color al pasar el mouse sobre el checkbox */
    .form-check-input:hover {
        background-color: #0056b3;
        /* Color más oscuro al pasar el mouse */
        border-color: #0056b3;
    }

    /* Estilo del contenedor de la fila del checkbox */
    .custom-control.custom-checkbox {
        display: flex;
        align-items: center;
        /* Alineación vertical de checkbox y etiqueta */
    }

    /* Ajuste para una mejor accesibilidad al hacer clic en el área del checkbox */
    .custom-control-label::before {
        width: 20px;
        height: 20px;
    }
</style>
@endsection