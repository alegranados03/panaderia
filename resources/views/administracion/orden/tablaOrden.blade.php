<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Codigo de Seguimiento</th>
            <th>Estado de Orden</th>
            <th>Estado de Pago</th>
            <th>Fecha de Creacion</th>
            <th>Mesa</th>
            <th>Ver Orden</th>
            <th>Pagar Orden</th>
            <th>Editar Orden</th>
            <th>Agregar Detalles a orden</th>
            <th>Eliminar Detalles a orden</th>
            <th>Eliminar Orden</th>
         </tr>
    </thead>
    <tbody>
      @foreach($ordenes as $orden)
        <tr class="odd gradeX">
            <td>{{$orden->codigo_seguimiento}}</td>
            <td>{{$orden->estado_servicio }}</td>
            <td>{{$orden->estado_pago}}</td>
            <td>{{$orden->created_at}}</td>
            <td>{{$orden->codigo_mesa}}</td>
            <td class="center" align="center">
                <a class="btn btn-info" href="{{route('ordenes.show',['id'=> $orden->id])}}"><i class="fa fa-eye"></i> Ver</a>
            </td>
            <td class="center" align="center">
                <a class="btn btn-warning" href="{{route('vistaPago',['id'=> $orden->id])}}"><i class="fa fa-check"></i> Pagar Orden</a>
            </td>
            <td class="center" align="center">
                <a class="btn btn-success" href="{{route('ordenes.edit',['id'=> $orden->id])}}"><i class="fa fa-edit"></i> Editar</a>
            </td>
            <td class="center" align="center">
                <a class="btn btn-primary" href="{{route('agregarProducto',['id'=> $orden->id])}}"><i class="fa fa-plus"></i> Agregar Producto</a>
            </td>
            <td class="center" align="center">
                <a class="btn btn-danger" href="{{route('quitarProducto',['id'=> $orden->id])}}"><i class="fa fa-minus"></i> Eliminar Producto</a>
            </td>

            <td class="center" align="center">
              <form class="form" method="post" action="{{ route('ordenes.destroy',['id'=> $orden->id]) }} ">
               <input type="hidden" name="_method" value="DELETE">
                      {{ csrf_field() }}
                      <div class="form-group">
                   <button  type="submit" class="btn btn-danger btn-sm "><span class="glyphicon glyphicon-trash"></span>Eliminar</a></button>
                   </form>
            </td>



        </tr>
      @endforeach
    </tbody>
</table>
