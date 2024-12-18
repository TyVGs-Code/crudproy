@extends('layouts.app')

@section('template_title')
    Instrucciones
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <div class="col-2 bg-primary text-white p-3" style="min-height: 100vh;">
            <h4 class="text-center mb-4">Instrucciones</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="#">Usuarios</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="#">Categorías</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="#">Configuraciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Cerrar sesión</a>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="col-10">
            <div class="d-flex justify-content-between align-items-center my-4">
                <h2>Lista de Instrucciones</h2>
                <div>
                    <a href="{{ route('instrucciones.create') }}" class="btn btn-success">Agregar Usuario</a>
                    <button class="btn btn-danger">Exportar a PDF</button>
                </div>
            </div>

            <!-- Mensaje de éxito -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <!-- Tabla de instrucciones -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Código</th>
                                <th>Nomins</th>
                                <th>Fecha de 
                                    revisión</th>
                                <th>Fecha de 
                                    emisión</th>
                                <th>Prox. Revisión</th>
                                <th>Estado</th>
                                <th>Responsable</th>
                                
                    
                                <th>Clase de 
                                    instrucción</th>
                              
                                <th>Nivel</th>
                                <th>Programa</th>
                                <th>Lista</th>
                                <th>Cuestionario</th>
                                <th>Guía</th>
                                <th>Ciclo</th>
                                <th>Diagrama</th>
                                <th>Desarrollo</th>
                                <th>Procedimiento</th>
                                <th>Portada</th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($instrucciones as $instruccione)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $instruccione->Id_ins }}</td>
                                    <td>{{ $instruccione->Codigo }}</td>
                                    <td>{{ $instruccione->Nomins }}</td>
                                    <td>{{ $instruccione->FechRev }}</td>
                                    <td>{{ $instruccione->FechEmi }}</td>
                                    <td>{{ $instruccione->FechProx }}</td>
                                    <td>{{ $instruccione->EstRev }}</td>
                                    <td>{{ $instruccione->ResRev }}</td>
                                    <td>{{ $instruccione->ResEla }}</td>
                                    <td>{{ $instruccione->ResApr }}</td>
                                    <td>{{ $instruccione->ClasInstr }}</td>
                                    <td>{{ $instruccione->Status }}</td>
                                    <td>{{ $instruccione->Nivel }}</td>
                                    <td>{{ $instruccione->Programa }}</td>
                                    <td>{{ $instruccione->Lista }}</td>
                                    <td>{{ $instruccione->Cuestionario }}</td>
                                    <td>{{ $instruccione->Guia }}</td>
                                    <td>{{ $instruccione->Ciclo }}</td>
                                    <td>{{ $instruccione->Diagrama }}</td>
                                    <td>{{ $instruccione->Desarrollo }}</td>
                                    <td>{{ $instruccione->Procedimiento }}</td>
                                    <td>{{ $instruccione->Portada }}</td>
                                    <td>{{ $instruccione->ins_TP }}</td>
                                    <td>
                                        <form action="{{ route('instrucciones.destroy', $instruccione->id) }}" method="POST">
                                            <a href="{{ route('instrucciones.show', $instruccione->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                            <a href="{{ route('instrucciones.edit', $instruccione->id) }}" class="btn btn-success btn-sm">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginación -->
            {!! $instrucciones->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
