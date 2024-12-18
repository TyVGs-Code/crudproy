<div class="row padding-1 p-1">
    <div class="col-md-12">
        @foreach([
            
            'Codigo' => 'Código',
            'Nomins' => 'Nombre de la instrucción',
          
            'ResRev' => 'Responsable de la revisión',
            'ClasInstr' => 'Clasificación',
            'Nivel' => 'Nivel',
        ] as $field => $label)
     

        <div class="form-group mb-3">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="text" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" 
                   value="{{ old($field, $instruccione?->$field) }}" id="{{ $field }}" placeholder="{{ $label }}">
            {!! $errors->first($field, '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    


        @endforeach

        <div class="form-group">
    <label for="EstRev">Estado de revisión</label>
    <input type="text" name="EstadoRevision" id="EstadoRevision" class="form-control" 
           value="{{ old('EstRev') }}" placeholder="1">
</div>

    </div>

    <div class="form-group mb-3">
    <label for="FechRev" class="form-label">Fecha de Revisión</label>
    <input type="date" name="FechRev" id="FechRev" 
           class="form-control @error('FechRev') is-invalid @enderror"
           value="{{ old('FechRev', $instruccione->FechRev ?? '') }}">
    @error('FechRev')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="FechEmi" class="form-label">Fecha de Emisión</label>
    <input type="date" name="FechEmi" id="FechEmi" 
           class="form-control @error('FechEmi') is-invalid @enderror"
           value="{{ old('FechEmi', $instruccione->FechEmi ?? '') }}">
    @error('FechEmi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
    <label for="Programa">Programa (.doc, .docx)</label>
    <input type="file" name="Programa" class="form-control @error('Programa') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Lista">Lista (.doc, .docx)</label>
    <input type="file" name="Lista" class="form-control @error('Lista') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Cuestionario">Cuestionario (.doc, .docx)</label>
    <input type="file" name="Cuestionario" class="form-control @error('Cuestionario') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Guia">Guia (.doc, .docx)</label>
    <input type="file" name="Guia" class="form-control @error('Guia') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Ciclo">Ciclo (.vsd, .vsdx)</label>
    <input type="file" name="Ciclo" class="form-control @error('Ciclo') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Diagrama">Diagrama (.doc, .docx)</label>
    <input type="file" name="Diagrama" class="form-control @error('Diagrama') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Desarrollo">Desarrollo (.doc, .docx)</label>
    <input type="file" name="Desarrollo" class="form-control @error('Desarrollo') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Procedimiento">Procedimiento (.txt)</label>
    <input type="file" name="Procedimiento" class="form-control @error('Procedimiento') is-invalid @enderror">
</div>
<div class="form-group">
    <label for="Portada">Portada (.pdf)</label>
    <input type="file" name="Portada" class="form-control @error('Portada') is-invalid @enderror">
</div>
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
