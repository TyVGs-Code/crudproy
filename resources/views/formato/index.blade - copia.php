@extends('layouts.app')

@section('template_title')
    Formatos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 class="mb-0">Lista de Formatos</h5>
                        <a href="{{ route('formatos.create') }}" class="btn btn-success btn-sm">Agregar Formato</a>
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
                    
                                <th>Formato</th>
                                <th>Fecha</th>
                                <th>Instrucción</th>
                                <th>Descargar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($formatos as $formato)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $formato->Formato }}</td>
        <td>{{ $formato->FechaC }}</td>
        <td>{{ $formato->Ins }}</td>
     
        
        <td>
    @if($formato->InstruccionFile)
        @php
            $extension = pathinfo($formato->InstruccionFile, PATHINFO_EXTENSION);
        @endphp
        @if($extension == 'pdf')
            <a href="{{ Storage::url($formato->InstruccionFile) }}" download>
                <i class="fas fa-file-pdf text-danger" title="Descargar PDF"></i>
            </a>
        @elseif(in_array($extension, ['doc', 'docx']))
            <a href="{{ Storage::url($formato->InstruccionFile) }}" download>
                <i class="fas fa-file-word text-primary" title="Descargar Word"></i>
            </a>
        @endif
    @else
        <span class="text-muted">No disponible</span>
    @endif
</td>


        <td class="text-center">
            <a class="btn btn-sm btn-primary" href="{{ route('formatos.show', $formato->Id_fmt) }}">Ver</a>
            <a class="btn btn-sm btn-warning" href="{{ route('formatos.edit', $formato->Id_fmt) }}">Editar</a>
            <form action="{{ route('formatos.destroy', $formato->Id_fmt) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {!! $formatos->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
