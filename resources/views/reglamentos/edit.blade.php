@extends('layouts.app')

@section('title', 'Editar Reglamento')

@section('content')
<h2>Editar Reglamento</h2>
<form action="{{ route('reglamentos.update', $reglamento->id_regl) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="origen">Origen:</label>
        <input type="text" name="origen" id="origen" class="form-control"
            value="{{ old('origen', $reglamento->origen) }}" required maxlength="60">
    </div>
    <div class="form-group">
        <label for="obligacion">Obligación:</label>
        <input type="text" name="obligacion" id="obligacion" class="form-control"
            value="{{ old('obligacion', $reglamento->obligacion) }}" required maxlength="100">
    </div>
    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo', $reglamento->tipo) }}"
            required maxlength="20">
    </div>
    <div class="form-group">
        <label for="Fk_cat">Categorías:</label>
        <select name="Fk_cat[]" id="Fk_cat" class="form-control" multiple required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}" @if(in_array($categoria->id_cat, $reglamento->categorias->pluck('id_cat')->toArray())) selected @endif>
                    {{ $categoria->Categoria }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-2">Actualizar</button>
    <a href="{{ route('reglamentos.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
</form>
@endsection