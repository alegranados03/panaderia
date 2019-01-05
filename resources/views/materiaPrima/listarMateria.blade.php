@extends('layouts.base')

@section('content')


<section>
	<div class="alert alert-info">
		<strong>Lista Materia Prima</strong>
	</div>


	<div class="container" id="panelAdminUsers">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administración de Materia Prima</div>
				<div class="panel-body">
					@if(session()->has('msj'))
					<div class="alert alert-success" role="alert">{{session('msj')}}</div>
					@endif
					@if(session()->has('msj2'))
					<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
					@endif

					<h1 style="display: inline;">Gestionar Materia Prima</h1>
					<a href="{{route('materiaPrima.create')}}" class="btn btn-primary btn-sm">
						<span class="glyphicon glyphicon-paperclip"></span>Ingresar Nuevo Material</a>
					<br>
					<div class="row" id="busquedaAvanzada">
						{!! Form::open(['route' => 'materiaPrima.index', 'method' =>'GET', 'class'=>'form-group']) !!}
						<div class="input-group input-group-sm">
							{!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar por Nombre','autocomplete'=>'off']) !!}
							<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>
							Buscar Material</button>
					</span>
						</div>

						{!! Form::close() !!}
					</div>
					<!--BUSCADOR DE Material-->
					<br><br>
					@if(count($materia_prima)>0)
					<div class="table-responsive">
						 <table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre del Material</th>
									<th class="text-center">Costo de Adquisiscion</th>
									<th class="text-center">Cantidad</th>
                  <th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($materia_prima as $pro)
										<tr>

											<td class="text-center"> {{ $pro->nombre_materia}} </td>
											<td class="text-center"> {{ $pro->costo_adquisicion }} </td>
											<td class="text-center"> {{ $pro->cantidad }} </td>
											<td>

                        <a href="{{ route('materiaPrima.edit',$pro->id) }}" class="btn btn-info btn-sm" >
                          <span class="glyphicon glyphicon-pencil"></span>Editar</a>

										<a href="{{ route('materiaPrima.show',$pro->id) }}" class="btn btn-success btn-sm">
											<span class="glyphicon glyphicon-eye-open"></span>Ver</a>

									<form method="GET" action=""
                    style='display: inline;'>
					                        <a href="" data-target="#modal-delete-{{$pro->id}}" data-toggle="modal">
											<button type="submit" class="btn btn-danger btn-sm">
											<span class="glyphicon glyphicon-trash"></span>Borrar</button></a></form>
											</td>
										</tr>
										@include('materiaPrima.modalEliminarMaterial')
							@endforeach
							</tbody>
						</table>
				{!! $materia_prima->render() !!}
					</div>
					<br>
					<br>
				</div>
			</div>
		</div>

	</div>
	@else
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="alert alert-danger">
							<strong>No se encuentra el Material</strong>
						</div>

					</div>
				</div>
			</div>
		</div>
	@endif
</section>
</section>
@endsection
