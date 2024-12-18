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
                        <div class="form-group mb-2">
                            <strong>Id Fmt:</strong>
                            {{ $formato->Id_fmt }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Formato:</strong>
                            {{ $formato->Formato }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Fecha de Creación:</strong>
                            {{ $formato->FechaC }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Instrucción Asociada:</strong>
                            {{ $formato->Ins }}
                        </div>

                        <!-- Vista previa del archivo -->
                        <div class="form-group mt-4">
                            <h5>Vista previa del archivo:</h5>

                            @if ($archivoUrl)
                                @if ($archivoEsPdf)
                                    <!-- Vista previa PDF -->
                                    <iframe src="{{ $archivoUrl }}" width="100%" height="600px"></iframe>
                                @elseif ($archivoEsWord)
                                    <!-- Vista previa Word usando Google Docs Viewer -->
                                    <iframe src="https://docs.google.com/gview?url={{ asset($archivoUrl) }}&embedded=true" width="100%" height="600px"></iframe>
                                @else
                                    <!-- Otros archivos: Mostrar enlace para descargar -->
                                    <p>El formato del archivo no es compatible con la vista previa.</p>
                                    <a href="{{ $archivoUrl }}" target="_blank" class="btn btn-info">Descargar Archivo</a>
                                @endif
                            @else
                                <p>No hay archivo asociado para vista previa.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
