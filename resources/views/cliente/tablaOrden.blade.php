<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Codigo de Segumiento</th>
            <th>Estado de la Orden</th>
            <th>Estado del Pago</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($ordenes as $orden)
    	<tr class="odd gradeX">
            <td>{{$orden->codigo_seguimiento}}</td>
            <td>{{$orden->estado_servicio}}</td>
            <td>{{$orden->estado_pago}}</td>
            <td class="center">{{$orden->created_at}}</td>
            <td class="center"><a class="btn btn-info" href="{{route('ordenes.show',$orden->id)}}"><i class="fa fa-eye"></i> Ver</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
