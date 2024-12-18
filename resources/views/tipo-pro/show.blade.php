@extends('layouts.app')

@section('template_title')
    {{ $tipoPro->name ?? __('Show') . " " . __('Tipo Pro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Pro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo-pros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tp:</strong>
                                    {{ $tipoPro->Id_tp }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipopro:</strong>
                                    {{ $tipoPro->TipoPro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clave:</strong>
                                    {{ $tipoPro->Clave }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
