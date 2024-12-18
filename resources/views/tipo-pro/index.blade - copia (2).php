@extends('layouts.app')

@section('template_title')
    Tipo Pros
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 class="mb-0">Lista de Tipo de Procedimientos</h5>
                        <a href="{{ route('tipo-pros.create') }}" class="btn btn-success btn-sm">Agregar Registro</a>
                        
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
                                <!-- <th>Id</th> -->
                                <th>Tipo de Procedimiento</th>
                                <th>Clave</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipopros as $tipopro)
                            <tr>
                              
                             
                              <td>{{ $loop->iteration }}</td>
                            
                                <td>{{ $tipopro->TipoPro }}</td>
                                <td>{{ $tipopro->Clave }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('tipo-pros.show', $tipopro->id) }}">Ver</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('tipo-pros.edit', $tipopro->id) }}">Editar</a>
                                    <form action="{{ route('tipo-pros.destroy', $tipopro->id) }}" method="POST" style="display: inline-block;">
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
                        {!! $tipoPros->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
