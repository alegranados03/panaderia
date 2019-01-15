<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Codigo de Seguimiento</th>
            <th>Estado de Orden</th>
            <th>Estado de Pago</th>
            <th>Fecha de Creacion</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($ordenes as $orden)
        <tr class="odd gradeX">
            <td>{{$orden->codigo_seguimiento}}</td>
            <td>{{$orden->estado_servicio }}</td>
            <td>{{$orden->estado_pago}}</td>
            <td>{{$orden->created_at}}</td>

            <td class="center">
                <a class="btn btn-info" href="{{route('ordenes.show',['id'=> $orden->id])}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{route('ordenes.edit',['id'=> $orden->id])}}"><i class="fa fa-edit"></i> Editar</a>
                <a class="btn btn-danger" href="{{route('ordenes.destroy',['id'=> $orden->id])}}"><i class="fa fa-trash"></i> Deshabilitar</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
