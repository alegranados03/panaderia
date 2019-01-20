@extends('layouts.base')
@section('titulo')
    Crear receta
@endsection
@section('content')

    <div class="container">
        <center><h2>Seleccionar materiales para producto {{$producto->nombre_producto}}</h2></center>
        {{ Form::open(['route' => 'recetas.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <input value="{{$producto->id}}" type="number" name="producto_id" style="visibility: hidden">
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
                            <input type="checkbox" name="material[]" onclick = "habilitarCantidad(this)" class="form-check-input" id="{{$material->id}}" value="{{$material->id}}">{{$material->nombre_materia}}
                        </label>
                    </div>
                </td>
                <div class="row">
                    <div class="col">
                        <td><input class="" disabled id="input{{$material->id}}" type="number" step="0.01" name="cantidad[]"  pattern="^\d*(\.\d{0,2})?$"  title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000"></td>
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
        function habilitarCantidad(input) {
            var idMaterial = input.value;
            if (!document.getElementById(idMaterial).checked) {
                document.getElementById("input"+idMaterial).disabled = true;
                document.getElementById("input"+idMaterial).value = "";
            }else{
                document.getElementById("input"+idMaterial).disabled = false;
            }
        }
    </script>
@endsection