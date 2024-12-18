@extends('layouts.app')

@section('template_title')
    Instrucciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Instrucciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('instrucciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Ins</th>
									<th >Codigo</th>
									<th >Nomins</th>
									<th >Fechrev</th>
									<th >Fechemi</th>
									<th >Fechprox</th>
									<th >Estrev</th>
									<th >Resrev</th>
									<th >Resela</th>
									<th >Resapr</th>
									<th >Clasinstr</th>
									<th >Status</th>
									<th >Nivel</th>
									<th >Programa</th>
									<th >Lista</th>
									<th >Cuestionario</th>
									<th >Guia</th>
									<th >Ciclo</th>
									<th >Diagrama</th>
									<th >Desarrollo</th>
									<th >Procedimiento</th>
									<th >Portada</th>
									<th >Ins Tp</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instrucciones as $instruccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $instruccione->Id_ins }}</td>
										<td >{{ $instruccione->Codigo }}</td>
										<td >{{ $instruccione->Nomins }}</td>
										<td >{{ $instruccione->FechRev }}</td>
										<td >{{ $instruccione->FechEmi }}</td>
										<td >{{ $instruccione->FechProx }}</td>
										<td >{{ $instruccione->EstRev }}</td>
										<td >{{ $instruccione->ResRev }}</td>
										<td >{{ $instruccione->ResEla }}</td>
										<td >{{ $instruccione->ResApr }}</td>
										<td >{{ $instruccione->ClasInstr }}</td>
										<td >{{ $instruccione->Status }}</td>
										<td >{{ $instruccione->Nivel }}</td>
										<td >{{ $instruccione->Programa }}</td>
										<td >{{ $instruccione->Lista }}</td>
										<td >{{ $instruccione->Cuestionario }}</td>
										<td >{{ $instruccione->Guia }}</td>
										<td >{{ $instruccione->Ciclo }}</td>
										<td >{{ $instruccione->Diagrama }}</td>
										<td >{{ $instruccione->Desarrollo }}</td>
										<td >{{ $instruccione->Procedimiento }}</td>
										<td >{{ $instruccione->Portada }}</td>
										<td >{{ $instruccione->ins_TP }}</td>

                                            <td>
                                                <form action="{{ route('instrucciones.destroy', $instruccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('instrucciones.show', $instruccione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('instrucciones.edit', $instruccione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $instrucciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
