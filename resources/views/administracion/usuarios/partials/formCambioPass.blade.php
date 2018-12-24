
	<form class="form-horizontal" role="form" method="post" action="{{ route('actualizarPassword',Auth::user()->id) }}">
			<!--<input type="hidden" name="_method" value="PUT">-->
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->


			<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
					<label for="old_password" class="col-md-4 control-label">Contraseña antigua</label>

					<div class="col-md-6">
							<input id="old_password" type="password" class="form-control" name="old_password" required >

							@if ($errors->has('old_password'))
									<span class="help-block">
											<strong>{{ $errors->first('old_password') }}</strong>
									</span>
							@endif
					</div>
			</div>


			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="col-md-4 control-label">Nueva Contraseña</label>

					<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" required >

							@if ($errors->has('password'))
									<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif
					</div>
			</div>
			<div class="form-group">
					<label for="password-confirm" class="col-md-4 control-label">Confirmación de Contraseña</label>

					<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
					</div>
			</div>

			<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar Cambios </button>
							</button>
					</div>

			</div>
