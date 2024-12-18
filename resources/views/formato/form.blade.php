<div class="row padding-1 p-1">
    <div class="col-md-12">
        @foreach([
            'Formato' => 'Formato',
            'FechaC' => 'Fecha de creación',
        ] as $field => $label)
        <div class="form-group mb-3">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="{{ $field == 'FechaC' ? 'date' : 'text' }}" name="{{ $field }}" 
                   class="form-control @error($field) is-invalid @enderror" 
                   value="{{ old($field, $formato->$field ?? '') }}" id="{{ $field }}" 
                   placeholder="{{ $label }}">
            {!! $errors->first($field, '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @endforeach

        <!-- Campo para seleccionar la Instrucción -->
        <div class="form-group mb-3">
    <label for="Ins" class="form-label">ID de Instrucción</label>
    <select name="Ins" id="Ins" class="form-control @error('Ins') is-invalid @enderror">
        <option value="">Seleccione una instrucción</option>
        @foreach($instrucciones as $instruccion)
            <option value="{{ $instruccion->Id_ins }}" 
                {{ old('Ins', $formato->Ins ?? '') == $instruccion->Id_ins ? 'selected' : '' }}>
                {{ $instruccion->Id_ins }}
            </option>
        @endforeach
    </select>
    @error('Ins')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>



        <!-- Campo para cargar el archivo de la Instrucción -->
        <div class="form-group mb-3">
            <label for="InstruccionFile" class="form-label">Archivo de Instrucción</label>
            <input type="file" name="InstruccionFile" id="InstruccionFile" class="form-control @error('InstruccionFile') is-invalid @enderror">
            {!! $errors->first('InstruccionFile', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <!-- Botones para guardar o cancelar -->
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
