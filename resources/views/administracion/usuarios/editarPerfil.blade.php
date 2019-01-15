@extends('layouts.base')

@section('titulo')
Editar Perfil
@endsection

@section('content')
{{ Form::model(Auth::user(),['route' => ['actualizarMiPerfil',Auth::user()->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}
@include('administracion.usuarios.partials.formMyEdit')
{{Form::close()}}
@endsection
