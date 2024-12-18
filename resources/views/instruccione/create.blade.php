@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Instruccione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Instruccione</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('instrucciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('instruccione.form')
                            <input type="text" name="Codigo" value="{{ old('Codigo', $instruccione->Codigo ?? '') }}" class="form-control" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </section>
@endsection
