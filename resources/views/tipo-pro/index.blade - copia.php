@extends('layouts.app')

@section('template_title')
    Tipo Pros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo Pros') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipo-pros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Tp</th>
									<th >Tipopro</th>
									<th >Clave</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoPros as $tipoPro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $tipoPro->Id_tp }}</td>
										<td >{{ $tipoPro->TipoPro }}</td>
										<td >{{ $tipoPro->Clave }}</td>

                                            <td>
                                                <form action="{{ route('tipo-pros.destroy', $tipoPro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-pros.show', $tipoPro->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-pros.edit', $tipoPro->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tipoPros->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
