@extends('layouts.base')
@section('titulo')
   Editar Hoja costeo
@endsection
@section('content')

    <div class="container">
        <center> <h2>Editar Hoja de costeo</h2></center>
        <center><p>ORDEN DE FABRICACION</p></center>
        {{ Form::model($lote,['route' => ['costes.update',$lote->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <div class="col-md-12">
            <div class="col-sm-6">

                <div class="form-inline">
                    <label for="">Produccion(Articulo)</label>
                    <input for="" class="form-control" name="producto" value="{{$lote->producto}}" disabled>

                </div>
                <div class="form-inline">
                    <label for="">No de Lote:</label>
                    <input type="text" class="form-control" value="{{$lote->codigoLote}}" name="codigoLote" disabled>
                </div>
                <div class="form-inline">
                    <label for="">Cantidad unidades:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" disabled value="{{$detalle->cantidad_unidades}}" onChange="importes()">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-inline">
                    <label for="">#Obreros:</label>
                    <input type="number" class="form-control" name="obreros" value="{{$detalle->numero_obreros}}"  id="obreros" onChange="calcular()">
                </div>
                <div class="form-inline">
                    <label for="">#Horas:</label>
                    <input type="number" class="form-control" name="horas" id="horas" step="any"  value="{{$detalle->numero_horas}}" onChange="calcular()">
                </div>
                <div class="form-inline">
                    <label for="">P/hora:</label>
                    <input type="number" class="form-control" name="phora" id="phora" step="any" value="{{$detalle->precio_hora}}"  onChange="calcular()">
                </div>
                <div class="form-inline">
                    <label for="">Sub-total MO:</label>
                    <input type="number" class="form-control" name="subtotal" id="subtotal" step="any" value="{{$detalle->sub_total_MO}}" onChange="importes()" >
                </div>
                <div class="form-inline">
                    <label for="">Tasa CIF %:</label>
                    <input type="number" class="form-control" name="tasa" id="tasa" step="any" value="{{number_format($detalle->tasa_cif,2,'.',',')}}" onChange="importes()">
                </div>
            </div>

        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
            </tr>

            </thead>
            <tbody>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr>

                <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Suma Materiales:</th>
                <th class="col-sm-2"><input value="{{$detalle->suma_materiales}}" id="suma_materiales" name="suma_materiales"  onChange="importes()"> </th>
            </tr>
            <tr>

                <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Importe  = Tasa%*(Materiales + Mano de obra):</th>
                <th class="col-sm-2"><input class="" id="importe" type="number" name="importe" step="any"  value="" onChange="importes()"></th>
            </tr>
            <tr>

                <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Total:</th>
                <th class="col-sm-2"><input class="" id="total" name="total" type="number" step="any"  value=""></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="row">
        <div class="container">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('costes.index')}}" class="btn btn-warning">Cancelar</a>
        </div>
    </div>
    {{Form::close()}}

    <script type="text/javascript">
        function calcular(){
            obreros = document.getElementById("obreros").value;
            pHoras = document.getElementById("phora").value;
            horas = document.getElementById("horas").value;


            resultado = obreros*pHoras*horas
            document.getElementById("subtotal").value = resultado;
        }



        function importes(){
            cantidad = document.getElementById("cantidad").value;

            tasa = document.getElementById("tasa").value;
            suma_materiales = document.getElementById("suma_materiales").value;
            subtotal = document.getElementById("subtotal").value;

            importe2 = ((parseFloat(subtotal)+parseFloat(suma_materiales))*(parseFloat(tasa)/100));
            importe3 = importe2.toFixed(2);
            document.getElementById("importe").value = parseFloat(importe3);

            total = (parseFloat(subtotal) + parseFloat(suma_materiales) + parseFloat(importe3))*parseInt(cantidad);
            total2 = total.toFixed(2);
            document.getElementById("total").value = total2;
        }

    </script>

@endsection