@extends('layouts.base')

@section('titulo')
Inicio
@endsection

@section('inicio')
Bienvenid@ al Sistema de Panaderia Lila
@endsection

@section('content')
<div class="container p-lg-5">
	<div class="row justify-content-center">
		<div class="col-lg-10 col-12">
			<div class="row justify-content-between text-center">
				{{-- contenedor de citas --}}

				<div class="col-12 col-md-4 col-xl-3 px-md-0" name="citas">
					<div class="row">
						<div class="col-12">
								<a href="{{route('ordenes.create')}}" class="btn btn-block btn-light">
									<i class="fa fa-book" style="font-size: 150px;color: black"></i><i class="fa fa-plus" style="font-size: 40px;color: black"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('ordenes.create')}}" class="btn btn-block btn-light" style="color: black;"><h3>Crear Orden</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('ordenes.index')}}" class="btn btn-block btn-light">
									<i class="fa fa-list" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('ordenes.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Ordenes-L</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('pendienteLinea')}}" class="btn btn-block btn-light">
									<i class="fa fa-list" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('pendienteLinea')}}" class="btn btn-block btn-light" style="color: black;"><h3>Ordenes-EL</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('historialLocal')}}" class="btn btn-block btn-light">
									<i class="fa fa-archive" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('historialLocal')}}" class="btn btn-block btn-light" style="color: black;"><h3>Historial Ordenes-L</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('historialLinea')}}" class="btn btn-block btn-light">
									<i class="fa fa-archive" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('historialLinea')}}" class="btn btn-block btn-light" style="color: black;"><h3>Historial Ordenes-EL</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('productos.index')}}" class="btn btn-block btn-light">
									<i class="fa fa-list-alt" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('productos.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Productos</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('usuarios.index')}}" class="btn btn-block btn-light">
									<i class="fa fa-group" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('usuarios.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Usuarios</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('categorias.index')}}" class="btn btn-block btn-light">
									<i class="fa fa-list-alt" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('categorias.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Categorias</h3>
							</a>
						</div>
					</div>
				</div>

				{{-- ##################################### --}}
				{{-- contenedor de procedimientos --}}
				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
								<a href="{{route('mesas.index')}}" class="btn btn-block btn-light">
									<i class="fa fa-cutlery" style="font-size: 150px;color: black;"></i>
								</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('mesas.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Mesas</h3>
							</a>
						</div>
					</div>


				</div>

				<div class="col-12 col-md-4 col-xl-3" name="procedimientos">
					<div class="row">
						<div class="col-12">
							<a href="{{route('costes.index')}}" class="btn btn-block btn-light">
								<i class="fa fa-file" style="font-size: 150px;color: black;"></i>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{route('costes.index')}}" class="btn btn-block btn-light" style="color: black;"><h3>Costeo</h3>
							</a>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
@endsection
