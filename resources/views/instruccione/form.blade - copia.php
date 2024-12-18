<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_ins" class="form-label">{{ __('Id Ins') }}</label>
            <input type="text" name="Id_ins" class="form-control @error('Id_ins') is-invalid @enderror" value="{{ old('Id_ins', $instruccione?->Id_ins) }}" id="id_ins" placeholder="Id Ins">
            {!! $errors->first('Id_ins', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="Codigo" class="form-control @error('Codigo') is-invalid @enderror" value="{{ old('Codigo', $instruccione?->Codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('Codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nomins" class="form-label">{{ __('Nomins') }}</label>
            <input type="text" name="Nomins" class="form-control @error('Nomins') is-invalid @enderror" value="{{ old('Nomins', $instruccione?->Nomins) }}" id="nomins" placeholder="Nomins">
            {!! $errors->first('Nomins', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fech_rev" class="form-label">{{ __('Fechrev') }}</label>
            <input type="text" name="FechRev" class="form-control @error('FechRev') is-invalid @enderror" value="{{ old('FechRev', $instruccione?->FechRev) }}" id="fech_rev" placeholder="Fechrev">
            {!! $errors->first('FechRev', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fech_emi" class="form-label">{{ __('Fechemi') }}</label>
            <input type="text" name="FechEmi" class="form-control @error('FechEmi') is-invalid @enderror" value="{{ old('FechEmi', $instruccione?->FechEmi) }}" id="fech_emi" placeholder="Fechemi">
            {!! $errors->first('FechEmi', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fech_prox" class="form-label">{{ __('Fechprox') }}</label>
            <input type="text" name="FechProx" class="form-control @error('FechProx') is-invalid @enderror" value="{{ old('FechProx', $instruccione?->FechProx) }}" id="fech_prox" placeholder="Fechprox">
            {!! $errors->first('FechProx', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="est_rev" class="form-label">{{ __('Estrev') }}</label>
            <input type="text" name="EstRev" class="form-control @error('EstRev') is-invalid @enderror" value="{{ old('EstRev', $instruccione?->EstRev) }}" id="est_rev" placeholder="Estrev">
            {!! $errors->first('EstRev', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="res_rev" class="form-label">{{ __('Resrev') }}</label>
            <input type="text" name="ResRev" class="form-control @error('ResRev') is-invalid @enderror" value="{{ old('ResRev', $instruccione?->ResRev) }}" id="res_rev" placeholder="Resrev">
            {!! $errors->first('ResRev', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="res_ela" class="form-label">{{ __('Resela') }}</label>
            <input type="text" name="ResEla" class="form-control @error('ResEla') is-invalid @enderror" value="{{ old('ResEla', $instruccione?->ResEla) }}" id="res_ela" placeholder="Resela">
            {!! $errors->first('ResEla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="res_apr" class="form-label">{{ __('Resapr') }}</label>
            <input type="text" name="ResApr" class="form-control @error('ResApr') is-invalid @enderror" value="{{ old('ResApr', $instruccione?->ResApr) }}" id="res_apr" placeholder="Resapr">
            {!! $errors->first('ResApr', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="clas_instr" class="form-label">{{ __('Clasinstr') }}</label>
            <input type="text" name="ClasInstr" class="form-control @error('ClasInstr') is-invalid @enderror" value="{{ old('ClasInstr', $instruccione?->ClasInstr) }}" id="clas_instr" placeholder="Clasinstr">
            {!! $errors->first('ClasInstr', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="Status" class="form-control @error('Status') is-invalid @enderror" value="{{ old('Status', $instruccione?->Status) }}" id="status" placeholder="Status">
            {!! $errors->first('Status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nivel" class="form-label">{{ __('Nivel') }}</label>
            <input type="text" name="Nivel" class="form-control @error('Nivel') is-invalid @enderror" value="{{ old('Nivel', $instruccione?->Nivel) }}" id="nivel" placeholder="Nivel">
            {!! $errors->first('Nivel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="programa" class="form-label">{{ __('Programa') }}</label>
            <input type="text" name="Programa" class="form-control @error('Programa') is-invalid @enderror" value="{{ old('Programa', $instruccione?->Programa) }}" id="programa" placeholder="Programa">
            {!! $errors->first('Programa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lista" class="form-label">{{ __('Lista') }}</label>
            <input type="text" name="Lista" class="form-control @error('Lista') is-invalid @enderror" value="{{ old('Lista', $instruccione?->Lista) }}" id="lista" placeholder="Lista">
            {!! $errors->first('Lista', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuestionario" class="form-label">{{ __('Cuestionario') }}</label>
            <input type="text" name="Cuestionario" class="form-control @error('Cuestionario') is-invalid @enderror" value="{{ old('Cuestionario', $instruccione?->Cuestionario) }}" id="cuestionario" placeholder="Cuestionario">
            {!! $errors->first('Cuestionario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="guia" class="form-label">{{ __('Guia') }}</label>
            <input type="text" name="Guia" class="form-control @error('Guia') is-invalid @enderror" value="{{ old('Guia', $instruccione?->Guia) }}" id="guia" placeholder="Guia">
            {!! $errors->first('Guia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciclo" class="form-label">{{ __('Ciclo') }}</label>
            <input type="text" name="Ciclo" class="form-control @error('Ciclo') is-invalid @enderror" value="{{ old('Ciclo', $instruccione?->Ciclo) }}" id="ciclo" placeholder="Ciclo">
            {!! $errors->first('Ciclo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="diagrama" class="form-label">{{ __('Diagrama') }}</label>
            <input type="text" name="Diagrama" class="form-control @error('Diagrama') is-invalid @enderror" value="{{ old('Diagrama', $instruccione?->Diagrama) }}" id="diagrama" placeholder="Diagrama">
            {!! $errors->first('Diagrama', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desarrollo" class="form-label">{{ __('Desarrollo') }}</label>
            <input type="text" name="Desarrollo" class="form-control @error('Desarrollo') is-invalid @enderror" value="{{ old('Desarrollo', $instruccione?->Desarrollo) }}" id="desarrollo" placeholder="Desarrollo">
            {!! $errors->first('Desarrollo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="procedimiento" class="form-label">{{ __('Procedimiento') }}</label>
            <input type="text" name="Procedimiento" class="form-control @error('Procedimiento') is-invalid @enderror" value="{{ old('Procedimiento', $instruccione?->Procedimiento) }}" id="procedimiento" placeholder="Procedimiento">
            {!! $errors->first('Procedimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="portada" class="form-label">{{ __('Portada') }}</label>
            <input type="text" name="Portada" class="form-control @error('Portada') is-invalid @enderror" value="{{ old('Portada', $instruccione?->Portada) }}" id="portada" placeholder="Portada">
            {!! $errors->first('Portada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ins__t_p" class="form-label">{{ __('Ins Tp') }}</label>
            <input type="text" name="ins_TP" class="form-control @error('ins_TP') is-invalid @enderror" value="{{ old('ins_TP', $instruccione?->ins_TP) }}" id="ins__t_p" placeholder="Ins Tp">
            {!! $errors->first('ins_TP', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>