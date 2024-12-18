<div class="row padding-1 p-1">
    <div class="col-md-12">
        @foreach([
            #'Id_tp' => 'ID del tipo de procedimiento',
            'TipoPro' => 'Tipo de procedimiento',
            'Clave' => 'Clave',
        ] as $field => $label)
        <div class="form-group mb-3">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="text" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" 
                   value="{{ old($field, $tipoPro?->$field) }}" id="{{ $field }}" placeholder="{{ $label }}">
            {!! $errors->first($field, '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @endforeach
    </div>

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
