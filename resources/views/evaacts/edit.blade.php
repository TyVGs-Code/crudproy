@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Actividad</h1>
    <form action="{{ route('evaacts.update', $evaact->Id_eva) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="NomAct">Nombre</label>
            <input type="text" class="form-control" id="NomAct" name="NomAct" value="{{ $evaact->NomAct }}" required>
        </div>
        <div class="form-group">
            <label for="Fecha">Fecha</label>
            <input type="date" class="form-control" id="Fecha" name="Fecha" value="{{ $evaact->Fecha }}" required>
        </div>
        <div class="form-group">
            <label for="Clasificacion">Clasificación</label>
            <input type="number" class="form-control" id="Clasificacion" name="Clasificacion" value="{{ $evaact->Clasificacion }}" required min="0" max="10">
        </div>

        <div class="form-group">
            <label for="Tipo">Tipo</label>
            <select class="form-control" id="Tipo" name="Tipo" value="{{ $evaact->Tipo }}" required>
                <option value="">Seleccione un tipo</option>
                <option value="Tipo A" {{ old('Tipo', $evaact->Tipo) == 'Tipo A' ? 'selected' : '' }}>Tipo A</option>
                <option value="Tipo B" {{ old('Tipo', $evaact->Tipo) == 'Tipo B' ? 'selected' : '' }}>Tipo B</option>
                <option value="Tipo C" {{ old('Tipo', $evaact->Tipo) == 'Tipo C' ? 'selected' : '' }}>Tipo C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Frecuencia">Frecuencia</label>
            <input type="text" class="form-control" id="Frecuencia" name="Frecuencia" value="{{ $evaact->Frecuencia }}"  required>
        </div>

        <div class="form-group">
          <label for="Status">Estado</label>
         <select class="form-control" id="Status" name="Status" value="{{ $evaact->Status }}" required>
           <option value="">Seleccione un estado</option>
           <option value="0" {{ old('Status', $evaact->Status) == '0' ? 'selected' : '' }}>Inactivo</option>
           <option value="1" {{ old('Status', $evaact->Status) == '1' ? 'selected' : '' }}>Activo</option>
         </select>
       </div>      

        <div class="form-group">
            <label for="Archivo">Archivo</label>
            <input type="file" class="form-control-file" id="Archivo" value="{{ $evaact->Archivo }}" name="Archivo">
        </div>

        <div class="form-group">
            <label for="Fk_ins">Instrucción</label>
            <select class="form-control" id="Fk_ins" name="Fk_ins" required>
                <option value="">Seleccione una instrucción</option>
                @foreach($instrucciones as $instruccion)
                    <option value="{{ $instruccion->Id_ins }}" {{ old('Fk_ins', $evaact->Fk_ins) == $instruccion->Id_ins ? 'selected' : '' }}>
                        {{ $instruccion->Codigo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fk_cat">Categoría</label>
            <select class="form-control" id="Fk_cat" name="Fk_cat" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_cat }}" {{ old('Fk_cat', $evaact->Fk_cat) == $categoria->id_cat ? 'selected' : '' }}>
                        {{ $categoria->Categoria }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('evaacts.index') }}" class="btn btn-primary">Regresar</a>
    </form>
</div>
@endsection