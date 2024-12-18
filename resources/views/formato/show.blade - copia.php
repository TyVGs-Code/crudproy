@extends('layouts.app')

@section('template_title')
    {{ $formato->name ?? __('Show') . " " . __('Formato') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Formato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('formatos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Fmt:</strong>
                                    {{ $formato->Id_fmt }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Formato:</strong>
                                    {{ $formato->Formato }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechac:</strong>
                                    {{ $formato->FechaC }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ins:</strong>
                                    {{ $formato->Ins }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
