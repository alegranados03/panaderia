@extends('layouts.base')

@section('titulo')
Detalle Orden
@endsection

@section('content')
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title" align="center"><h1>Orden</h1></div>
						<table width="100%" cellpadding="0">
									        	<tr  align="center">
									        		<th width="31%">Panaderia Lila</th>

									        		<th width="30%" style="text-align: center;">Orden</th>
									        		<th width="20%" rowspan="2"><img src="{{asset('img/logo.png')}}" width="100px" height="100px"></th>
									        	</tr>
									        	<tr>
									        		<th style="text-align: justify;">Dirección: Avenida Monseñor Romero y Final Calle 5 de Noviembre entre 21ª y 23ª Calle Oriente, una cuadra al norte del Mercado San Miguelito.</th>
															<th style="text-align:center"><h3>{{$codigo}}</h3></th>
									        	</tr>
														<tr>
															<td colspan="3">
																<br/>
															</td>
														</tr>
														<tr>
															<td colspan="3">
																<br/>
															</td>
														</tr>
														<tr>
															<td colspan="3">
																<br/>
															</td>
														</tr>
									        	<tr>
															<table width="100%">
																<tr>
																	<table  width="100%">
																		<tr>
																			<td><h4><strong>Nombre:</strong></h4></td>
																			<td><h4><strong>{{Auth::user()->primerNombre}} {{Auth::user()->segundoNombre}} {{Auth::user()->primerApellido}} {{Auth::user()->segundoApellido}}</strong></h4>
																			<td><h4><strong>Fecha:</strong></h4></td>
																			<td><h4>{{$fechaCreacion}}</h4></td>
																		</tr>
																	</table>
																</tr>
															</table>
									        	</tr>
									        </table>
									        <br/>
									        <table border="solid" width="100%" cellpadding="0">
									        	<tr align="center" style="background-color: rgba(0,0,0,0.2);">
									        		<th>Cantidad</th>
									        		<th>Descripcion</th>
									        		<th>Costo Unitario</th>
									        		<th>Total</th>
									        	</tr>

											        	@foreach($detallesOrden as $prod)
											        	<tr align="center">
												        	<td>{{$prod->cantidad_producto}}</td>
												        	<td>{{$prod->nombre_producto}}</td>
												        	<td>

																$ {{$prod->total_parcial/$prod->cantidad_producto}}
												        	</td>
												        	<td>$ {{$prod->total_parcial}}</td>
												        </tr>
											        	@endforeach
											        	<tr>
												    		<td align="right" colspan="3"><strong>Total:</strong></td>
												    		<td align="center">$ {{$total}}</td>
										      			</tr>

									        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
