@extends('layouts.base')
@section('titulo')
    Crear receta
@endsection
@section('content')

    <div class="container">
        <center><h2>Seleccionar materiales para producto {{$producto->nombre_producto}}</h2></center>
        {{ Form::open(['route' => 'recetas.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <input value="{{$producto->id}}" type="number" name="producto_id">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Materia Prima</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody>
            @if($materiales)
                @foreach($materiales as $material)
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="material[]" class="form-check-input" value="{{$material->id}}">{{$material->nombre_materia}}
                        </label>
                    </div>
                </td>
                <div class="row">
                    <div class="col">
                        <td><input class="" type="number" id="boton" name="cantidad[]" step="any"></td>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </tr>
                @endforeach
             @else
            <h2>No hay datos</h2>
              @endif
            </tbody>
        </table>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('recetas.index')}}" class="btn btn-warning">Cancelar</a>
        {{Form::close()}}
    </div>

    <script >

    </script>
@endsection