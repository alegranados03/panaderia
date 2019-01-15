<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Nombre de Categoria</th>
            <th>Descripción de Categoría</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
    	<tr class="odd gradeX">
            <td>{{$categoria->nombre_categoria}}</td>
            <td>{{$categoria->descripcion}}</td>
            <td class="center">
                <a class="btn btn-info" href="{{route('categorias.show',['id'=> $categoria->id])}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{route('categorias.edit',['id'=> $categoria->id])}}"><i class="fa fa-edit"></i> Editar</a>
                <a class="btn btn-danger" href="{{route('categorias.destroy',['id'=> $categoria->id])}}"><i class="fa fa-trash"></i> Deshabilitar</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
