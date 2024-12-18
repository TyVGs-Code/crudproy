@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Actividad</h1>
    <form action="{{ route('evaacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="NomAct">Nombre</label>
            <input type="text" class="form-control" id="NomAct" name="NomAct" required>
        </div>
        <div class="form-group">
            <label for="Fecha">Fecha</label>
            <input type="date" class="form-control" id="Fecha" name="Fecha" required>
        </div>

        <div class="form-group">
            <label for="Clasificacion">Clasificación</label>
            <input type="text" class="form-control" id="Clasificacion" name="Clasificacion" required>
        </div>

        <div class="form-group">
            <label for="Tipo">Tipo</label>
            <select class="form-control" id="Tipo" name="Tipo" required>
                <option value="">Seleccione un tipo</option>
                <option value="Tipo A">Tipo A</option>
                <option value="Tipo B">Tipo B</option>
                <option value="Tipo C">Tipo C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Frecuencia">Frecuencia</label>
            <input type="text" class="form-control" id="Frecuencia" name="Frecuencia" required>
        </div>

        <div class="form-group">
          <label for="Status">Estado</label>
         <select class="form-control" id="Status" name="Status" required>
           <option value="">Seleccione un estado</option>
           <option value="0">Inactivo</option>
           <option value="1">Activo</option>
         </select>
       </div>        


        <div class="form-group">
            <label for="Fk_ins">Instrucción</label>
            <select class="form-control" id="Fk_ins" name="Fk_ins" required>
                <option value="">Seleccione una instrucción</option>
                @foreach($instrucciones as $instruccion)
                    <option value="{{ $instruccion->Id_ins }}">{{ $instruccion->Codigo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_cat">Categoría</label>
            <select class="form-control" id="Fk_cat" name="Fk_cat" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_cat }}">{{ $categoria->Categoria }}</option>
                @endforeach
            </select>
        </div>

        <!-- Resto de campos -->
        <div class="form-group">
            <label for="Archivo">Archivo</label>
            <input type="file" class="form-control-file" id="Archivo" name="Archivo">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('evaacts.index') }}" class="btn btn-primary">Regresar</a>
    </form>
</div>
@endsection