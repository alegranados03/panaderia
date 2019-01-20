@extends('layouts.base')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <br><br><br>
        <h1><div class="card-header">{{ __('Editar Material') }}</div></h1>
        <div class="card-body">
          @if(session()->has('msj'))
          <div class="alert alert-success" role="alert">{{session('msj')}}</div>
          @endif
          @if(session()->has('msj2'))
          <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
          @endif

          <form method="POST" action="{{ route('materiaPrima.update',$materia_prima->id) }}">
          <input type="hidden" name="_method" value="PUT">
            @csrf




         


            <div class="form-group row">
              <label for="nombre_materia" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Material') }}</label>

              <div class="col-md-6">
                <input id="nombre_materia" type="text" class="form-control{{ $errors->has('nombre_materia') ? ' is-invalid' : '' }}" name="nombre_materia" value="{{ $materia_prima->nombre_materia }}" pattern="/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])$+/" required autofocus>

                @if ($errors->has('nombre_materia'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nombre_materia') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label for="costo_adquisicion" class="col-md-4 col-form-label text-md-right">{{ __('Costo de Adquisicion') }}</label>

              <div class="col-md-6">
                <input id="costo_adquisicion" type="double" step="0.01" class="form-control{{ $errors->has('costo_adquisicion') ? ' is-invalid' : '' }}" name="costo_adquisicion" value="{{ $materia_prima->costo_adquisicion }}" pattern="^\d*(\.\d{0,2})?$" title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000" required autofocus>

                @if ($errors->has('costo_adquisicion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('costo_adquisicion') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

              <div class="col-md-6">
                <input id="cantidad" type="number"  class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" min="0" max="1000000" value="{{ $materia_prima->cantidad }}" pattern="[0-9]+" required autofocus>

                @if ($errors->has('cantidad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Registrar') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
