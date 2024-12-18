<div class="row p-1">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="TipoPro" class="form-label">Tipo de procedimiento</label>
            <input type="text" name="TipoPro" id="TipoPro" 
                   class="form-control @error('TipoPro') is-invalid @enderror"
                   value="{{ old('TipoPro', $tipoPro->TipoPro ?? '') }}" placeholder="Tipo de procedimiento">
            @error('TipoPro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="Clave" class="form-label">Clave</label>
            <input type="text" name="Clave" id="Clave"
                   class="form-control @error('Clave') is-invalid @enderror"
                   value="{{ old('Clave', $tipoPro->Clave ?? '') }}" placeholder="Clave">
            @error('Clave')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo-pros.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
