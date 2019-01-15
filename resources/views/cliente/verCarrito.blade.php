@extends('layouts.baseCliente')

@section('titulo')
Carrito
@endsection

@section('links')
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('OneTech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_responsive.css')}}">
@endsection

@section('content')
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">

						<div class="cart_title" align="center"><h1>Carrito de Compras</h1></div>
								@if(Session::has('carrito'))
									<div class="cart_items">
									<ul class="cart_list">
									@foreach($productos as $prod)
									<li class="cart_item clearfix">
										<div class="cart_item_image"><img src="{{$prod['elemento']->imagen}}" alt=""></div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Nombre del Producto</div>
												<div class="cart_item_text">{{$prod['elemento']->nombre_producto}}</div>
											</div>
											<div class="cart_item_quantity cart_info_col">
												<div class="cart_item_title">Cantidad</div>
												<div class="cart_item_text" align="center">{{$prod['cantidad']}}</div>
											</div>
											<div class="cart_item_price cart_info_col">
												<div class="cart_item_title">Precio Unitario</div>
												<div class="cart_item_text" align="center">
													@php
														 $x = $prod['precio']/$prod["cantidad"];
													@endphp
													$ {{$x}}
												</div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Añadir</div>
												<div class="cart_item_text">
													<a href="{{route('agregar',['idProducto'=>$prod['elemento']->id,'redir'=>2])}}"><span class="fa fa-plus"  title="Agregar un artículo de este tipo"></span></a>
												</div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Quitar</div>
												<div class="cart_item_text">
													<a href="{{route('disminuir',$prod['elemento']->id)}}"><span class="fa fa-minus" title="Disminuir un artículo de este tipo"></span></a>
												</div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Eliminar</div>
												<div class="cart_item_text" align="center">
                    								<a href="{{route('quitar',$prod['elemento']->id)}}"><span class="fa fa-trash" title="Eliminar todos"></span></a>
												</div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Total</div>
												<div class="cart_item_text">${{$prod['precio']}}</div>
											</div>
										</div>
									</li>
									@endforeach
										</ul>
									</div>
									<!-- Order Total -->
									<div class="order_total">
										<div class="order_total_content text-md-right">
											<div class="order_total_title">Total:</div>
											<div class="order_total_amount">${{$precioTotal}}</div>
										</div>
									</div>
								@else
								<div class="cart_items">
									<ul class="cart_list">
									</ul>
								</div>
								@endif
						<br/>
						<div class="container" align="center">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary bg-dark" data-toggle="modal" data-target="#exampleModal">
									  Proceder a pagar
									</button>

									{{ Form::open(['route' => 'usuarios.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off' ])}}
									<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h2 class="modal-title" id="exampleModalLabel">Detalle de la Orden</h2>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <table width="100%" cellpadding="0">
									        	<tr  align="center">
									        		<th width="31%">Panaderia Lila</th>
									        		<th width="30%"></th>
									        		<th width="20%" rowspan="2"><img src="{{asset('img/logo.png')}}" width="100px" height="100px"></th>
									        	</tr>
									        	<tr>
									        		<th style="text-align: justify;">Dirección: Avenida Monseñor Romero y Final Calle 5 de Noviembre entre 21ª y 23ª Calle Oriente, una cuadra al norte del Mercado San Miguelito.</th>
									        	</tr>
									        	<tr>
									        		<td colspan="3">
									        		</td>
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
									        		@if(Session::has('carrito'))
											        	@foreach($productos as $prod)
											        	<tr align="center">
												        	<td>{{$prod['cantidad']}}</td>
												        	<td>{{$prod['elemento']->nombre_producto}}</td>
												        	<td>
												        		@php
																	 $x = $prod['precio']/$prod["cantidad"];
																@endphp
																$ {{$x}}
												        	</td>
												        	<td>$ {{$prod['precio']}}</td>
												        </tr>
											        	@endforeach
											        	<tr>
												    		<td align="right" colspan="3"><strong>Total:</strong></td>
												    		<td align="center">$ {{$precioTotal}}</td>
										      			</tr>
											        	@else

											        	@endif
									        </table>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													@auth
													<a class="btn btn-md btn-primary" href="{{route('pagos.index')}}">Continuar</a>
													@else
													<a class="btn btn-md btn-primary" href="{{route('login')}}">Inicia sesión para poder cancelar</a>
													@endauth
									      </div>
									    </div>
									  </div>
									</div>

									{{Form::close()}}
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
<script src="{{asset('OneTech/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('OneTech/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('OneTech/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('OneTech/plugins/easing/easing.js')}}"></script>
<script src="{{asset('OneTech/js/cart_custom.js')}}"></script>
@endsection
