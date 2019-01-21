<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Nombre del Producto</th>
            <th>Stock</th>
            <th>Tipo de Producto</th>
            <th>Precio</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
    	<tr class="odd gradeX">
            <td>{{$producto->nombre_producto}}</td>
            <td>{{$producto->stock }}</td>
            <td>{{$producto->nombre_categoria}}</td>
            <td>{{$producto->precio}}</td>
            <td class="center">
                <a class="btn btn-info" href="{{route('productos.show',['id'=> $producto->id])}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{route('productos.edit',['id'=> $producto->id])}}"><i class="fa fa-edit"></i> Editar</a>
              
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
