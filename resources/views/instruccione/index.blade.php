@php $i = 0; @endphp
@extends('layouts.app')

@section('template_title')
    Instrucciones
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 class="mb-0">Lista de Instrucciones</h5>
                        <a href="{{ route('instrucciones.create') }}" class="btn btn-success btn-sm">Agregar Instrucción</a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light text-center">
                            <tr>
                            <th>No</th>
                                <th>Código</th>
                                <th>Nomins</th>
                                <th>Fecha de revisión</th>
                                <th>Fecha de emisión</th>
                                <th>Próxima revisión</th>
                                <th>Estado</th>
                                <th>Responsable</th>
                                <th>Estado de la revisión</th>
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
                              
                                <td>{{ $instruccione->Codigo }}</td>
                                <td>{{ $instruccione->Nomins }}</td>
                                <td>{{ $instruccione->FechRev }}</td>
                                <td>{{ $instruccione->FechEmi }}</td>
                                <td>{{ $instruccione->FechProx }}</td>
                               
                                <td>{{ $instruccione->EstRev }}</td>
                                <td>{{ $instruccione->usuario ? $instruccione->usuario->Nombre . ' ' . $instruccione->usuario->Appa . ' ' . $instruccione->usuario->Apma : 'No asignado' }}</td>
           
                                <td>{{ $instruccione->ClasInstr }}</td>
                                <td>{{ $instruccione->Nivel }}</td>
                                <!-- Mostrar iconos si el documento existe -->
        <td>
            @if($instruccione->Programa)
                <a href="{{ Storage::url($instruccione->Programa) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Programa"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Lista)
                <a href="{{ Storage::url($instruccione->Lista) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Lista"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Cuestionario)
                <a href="{{ Storage::url($instruccione->Cuestionario) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Cuestionario"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Guia)
                <a href="{{ Storage::url($instruccione->Guia) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Guía"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Ciclo)
                <a href="{{ Storage::url($instruccione->Ciclo) }}" download>
                    <i class="fas fa-file-alt text-success" title="Descargar Ciclo (Visio)"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Diagrama)
                <a href="{{ Storage::url($instruccione->Diagrama) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Diagrama"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Desarrollo)
                <a href="{{ Storage::url($instruccione->Desarrollo) }}" download>
                    <i class="fas fa-file-word text-primary" title="Descargar Desarrollo"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Procedimiento)
                <a href="{{ Storage::url($instruccione->Procedimiento) }}" download>
                    <i class="fas fa-file-alt text-warning" title="Descargar Procedimiento (TXT)"></i>
                </a>
            @endif
        </td>

        <td>
            @if($instruccione->Portada)
                <a href="{{ Storage::url($instruccione->Portada) }}" download>
                    <i class="fas fa-file-pdf text-danger" title="Descargar Portada (PDF)"></i>
                </a>
            @endif
        </td>
                                <td class="text-center">

                                <a href="{{ route('formatos.index', ['instruccion_id' => $instruccione->Id_ins]) }}" 
           class="btn btn-info btn-sm">
           <i class="fa fa-file"></i> <!-- Icono de hoja/documento -->
        </a>
                                
                                    <a href="{{ route('instrucciones.edit', $instruccione->Id_ins) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('instrucciones.destroy', $instruccione->Id_ins) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {!! $instrucciones->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
