@extends('layouts.base')
@section('titulo')
    Hoja costeo
@endsection
@section('content')

    <div class="container">

        <center> <h2>Hoja de costeo</h2></center>
        <center><p>ORDEN DE FABRICACION</p></center>
        {{ Form::open(['route' => 'costes.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
            <div class="col-md-12">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="">Produccion(Articulo):</label>
                        <input for="" class="form-control" name="producto" value="{{$valor2->nombre_producto}}" required readonly>

                    </div>
                    <div class="form-group">
                        <label for="">No de Lote:</label>
                        <input type="text" class="form-control" value="{{$orden}}" name="codigoLote" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad unidades:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" onChange="importes()" pattern="[0-9]{1,3}" title="Introducir valor numerico positivo " placeholder="0.00" min="0" max="1000000" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">#Obreros:</label>
                        <input type="number" class="form-control" name="obreros"  id="obreros" onChange="calcular()" pattern="[0-9]{1,3}" title="Introducir valor numerico positivo" placeholder="0" min="0" max="1000000" required>
                    </div>
                    <div class="form-group">
                        <label for="">#Horas:</label>
                        <input type="number" class="form-control" name="horas" id="horas" step="any"  onChange="calcular()" pattern="^\d*(\.\d{0,2})?$"  title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000" required>
                    </div>
                    <div class="form-group">
                        <label for="">P/hora:</label>
                        <input type="number" class="form-control" name="phora" id="phora" step="any"  onChange="calcular()" pattern="^\d*(\.\d{0,2})?$"  title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sub-total MO:</label>
                        <input type="number" class="form-control" name="subtotal" id="subtotal" step="any"  onchange="importes()" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tasa CIF %:</label>
                        <input type="number" class="form-control" name="tasa" id="tasa" step="any"  onchange="importes()" pattern="^\d*(\.\d{0,2})?$"  title="Introducir valor numerico positivo con 2 decimales" placeholder="0.00" min="0" max="1000000" required>
                    </div>
                </div>

            </div>
            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="col-sm-5 " style="background-color:DodgerBlue;color:white"><center>Materiales</center></th>
                </tr>

                </thead>
                <tbody>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <div class="col-md-5">
                        <th class="col-sm-3">Materiales</th>
                        <th class="col-sm-1">Cantidad</th>
                        <th class="col-sm-1">P.U</th>
                        <th class="col-sm-1">Sub-Tota Materialesl</th>
                    </div>
                </tr>
                </thead>
                <tbody>
                @foreach($receta as $rec)
                    <tr>
                        <td>{{$rec->nombre_materia}}</td>
                        <td>{{$rec->cantidad_individual}}</td>
                        <td>
                            {{number_format(($rec->costo_adquisicion / $rec->cantidad),2,'.',',')}}
                        </td>
                        <td>
                            {{$rec->cantidad_individual*number_format((($rec->costo_adquisicion/ $rec->cantidad)),2,'.',',')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Suma Materiales:</th>
                    <th class="col-sm-2"><input value="{{$materiales}}" id="suma_materiales" name="suma_materiales" step="any" onchange="importes()" readonly> </th>
                </tr>
                <tr>

                    <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Importe  = Tasa%*(Materiales + Mano de obra):</th>
                    <th class="col-sm-2"><input class="" id="importe" type="number" name="importe" step="any"  onchange="importes()" readonly></th>
                </tr>
                <tr>

                    <th class="col-sm-10 " style="background-color:DodgerBlue;color:white">Total:</th>
                    <th class="col-sm-2"><input class="" id="total" name="total" type="number" step="any"  value="" readonly></th>
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


