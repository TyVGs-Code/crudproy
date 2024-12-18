@extends('layouts.app')

@section('template_title')
    {{ $instruccione->name ?? __('Show') . " " . __('Instruccione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Instruccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('instrucciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Ins:</strong>
                                    {{ $instruccione->Id_ins }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo:</strong>
                                    {{ $instruccione->Codigo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nomins:</strong>
                                    {{ $instruccione->Nomins }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechrev:</strong>
                                    {{ $instruccione->FechRev }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechemi:</strong>
                                    {{ $instruccione->FechEmi }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechprox:</strong>
                                    {{ $instruccione->FechProx }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estrev:</strong>
                                    {{ $instruccione->EstRev }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resrev:</strong>
                                    {{ $instruccione->ResRev }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resela:</strong>
                                    {{ $instruccione->ResEla }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resapr:</strong>
                                    {{ $instruccione->ResApr }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clasinstr:</strong>
                                    {{ $instruccione->ClasInstr }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $instruccione->Status }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nivel:</strong>
                                    {{ $instruccione->Nivel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Programa:</strong>
                                    {{ $instruccione->Programa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lista:</strong>
                                    {{ $instruccione->Lista }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cuestionario:</strong>
                                    {{ $instruccione->Cuestionario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Guia:</strong>
                                    {{ $instruccione->Guia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciclo:</strong>
                                    {{ $instruccione->Ciclo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Diagrama:</strong>
                                    {{ $instruccione->Diagrama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desarrollo:</strong>
                                    {{ $instruccione->Desarrollo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Procedimiento:</strong>
                                    {{ $instruccione->Procedimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Portada:</strong>
                                    {{ $instruccione->Portada }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ins Tp:</strong>
                                    {{ $instruccione->ins_TP }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
