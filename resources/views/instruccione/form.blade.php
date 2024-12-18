<form method="POST" action="{{ route('instrucciones.store') }}" enctype="multipart/form-data">
    @csrf

<div class="row padding-1 p-1">
    <div class="col-md-12">
        @foreach([
            'Codigo' => 'Código',
            'Nomins' => 'Nombre de la instrucción',
            'ClasInstr' => 'Clasificación',
        ] as $field => $label)
        <div class="form-group mb-3">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="text" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" 
                   value="{{ old($field, $instruccione?->$field) }}" id="{{ $field }}" placeholder="{{ $label }}">
            {!! $errors->first($field, '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @endforeach


   <!-- Dropdown para seleccionar el usuario -->
   <select name="ResRev" id="Usuario" class="form-control @error('ResRev') is-invalid @enderror">
    <option value="">Seleccione un usuario</option>
    @foreach($usuarios as $usuario)
        <option value="{{ $usuario->Id_usu }}" 
            {{ old('ResRev', $instruccione->ResRev ?? '') == $usuario->Id_usu ? 'selected' : '' }}>
            {{ $usuario->Nombre }} {{ $usuario->Appa }} {{ $usuario->Apma }}
        </option>
    @endforeach
</select>






        <div class="form-group">
            <label for="EstRev">Estado de revisión</label>
            <input type="text" name="EstRev" id="EstRev" class="form-control" 
                   value="{{ old('EstRev') }}" placeholder="1">
        </div>

        <div class="form-group">
            <label for="Nivel">Nivel</label>
            <input type="text" name="Nivel" id="Nivel" class="form-control" 
                   value="{{ old('Nivel') }}" placeholder="1">
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

    <div class="form-group mb-3">
        <label for="FechProx" class="form-label">Próxima fecha de revisión</label>
        <input type="date" name="FechProx" id="FechProx" 
               class="form-control @error('FechProx') is-invalid @enderror"
               value="{{ old('FechProx', $instruccione->FechProx ?? '') }}">
        @error('FechProx')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @foreach([
        'Programa' => 'Programa (.doc, .docx)',
        'Lista' => 'Lista (.doc, .docx)',
        'Cuestionario' => 'Cuestionario (.doc, .docx)',
        'Guia' => 'Guia (.doc, .docx)',
        'Ciclo' => 'Ciclo (.vsd, .vsdx)',
        'Diagrama' => 'Diagrama (.doc, .docx)',
        'Desarrollo' => 'Desarrollo (.doc, .docx)',
        'Procedimiento' => 'Procedimiento (.txt)',
        'Portada' => 'Portada (.pdf)',
    ] as $field => $label)
    <div class="form-group">
        <label for="{{ $field }}">{{ $label }}</label>
        <input type="file" name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror">
        <span id="fileName_{{ $field }}" class="file-name" style="color: blue; display: none;"></span>
        @error($field)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
         @if(isset($instruccione->$field))
    <small>Archivo actual: <a href="{{ Storage::url($instruccione->$field) }}" target="_blank">Ver archivo</a></small>
@endif
    </div>
    @endforeach
   

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>

<!-- Script para cambiar el color del texto del archivo cargado -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInputs = document.querySelectorAll('input[type="file"]');

        fileInputs.forEach(function (fileInput) {
            fileInput.addEventListener('change', function () {
                const fileNameSpan = document.getElementById('fileName_' + fileInput.name);

                if (this.files && this.files.length > 0) {
                    fileNameSpan.textContent = this.files[0].name; // Muestra el nombre del archivo
                    fileNameSpan.style.display = "inline"; // Muestra el span
                } else {
                    fileNameSpan.textContent = "";
                    fileNameSpan.style.display = "none";
                }
            });
        });
    });
</script>


</form>