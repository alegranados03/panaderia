@extends('layouts.base')
@section('titulo')
Usuarios
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Editar Usuario
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::model($user,['route' => ['usuarios.update',$user->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}

            	@include('administracion.usuarios.partials.formEdit')

            	{{Form::close()}}
            </div>
@endsection


@section('javascript')
<script type="text/javascript">
  var myVar = document.getElementById("rol_id").value;
  document.getElementById("role_id").value= myVar; 
</script>
@endsection
