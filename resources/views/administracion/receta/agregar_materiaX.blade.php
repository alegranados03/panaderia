@extends('layouts.base')
@section('titulo')
    Editar Recetas
@endsection
@section('content')
    <div class="container">
       <div class="col-lg-12">
           <div class="panel panel-default">
               <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                   <div class="row">
                       <div class="col-md-12">
                           <center><h2>{{$producto->nombre_producto}}</h2></center>
                       </div>
                   </div>
               </div>
           </div>
           <div class="panel-body">
               {{ Form::open(['route' => 'insertarmxStore', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
               <div class="form-group">
                   <label>Numero de receta:<input type="number" value="{{$receta->id}}" class="form-control" name="idReceta" readonly></label>
               </div>
               <div class="form-group">
                   <label>
                       Seleccione material:
                      <select name="material" class="form-control" required>
                           <option value="">-------</option>
                           @foreach($materiales as $materia)
                               <option value="{{$materia->id}}">{{$materia->nombre_materia}}</option>
                           @endforeach
                       </select>
                   </label>
               </div>
               <div class="form-group">
                   <label>
                       Cantidad invividual:
                       <input type="number" step="0.01" name="cantidad" class="form-control" pattern="^\d*(\.\d{0,2})?$"  title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000" required>
                   </label>
               </div>
               <button type="submit" class="btn btn-success">Guardar</button>
               <a class="btn btn-danger" href="">Cancelar</a>
               {{Form::close()}}
           </div>
       </div>
       </div>

@endsection