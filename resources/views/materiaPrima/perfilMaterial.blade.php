@extends('layouts.base')

@section('content')

<section>


	<div class="container">
		<div id="loginbox" style="margin-top:30px">
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<div class="panel-title">Información del Material</div>
				</div>
				<div style="padding-top:30px" class="panel-body" >
					@if(session()->has('msj3'))
					<div class="alert alert-success" role="alert">{{session('msj3')}}</div>
					@endif

					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->

					<!--tabla 1-->
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>

									<th class="text-center">Nombre</th>
                                    <th class="text-center">Costo de Adquisicion</th>
									<th class="text-center">Cantidad</th>



								</tr>
							</thead>
							<tbody>

								<tr>


									<td class="text-center"> {{ $materia_prima->nombre_materia }} </td>
									<td class="text-center"> {{ $materia_prima->costo_adquisicion }} </td>
                                    <td class="text-center"> {{ $materia_prima->cantidad }} </td>
								</tr>

							</tbody>
						</table>
					</div>

					<!--tabla 2-->
					<input name="button" type="button" class="btn btn-warning btn-sm" onclick="window.location.replace('{{ route('materiaPrima.index') }}');" value="Salir" />
					<a href="{{route('materiaPrima.edit',$materia_prima->id)}}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span>Editar producto</a></td>
				</section>






				@endsection
