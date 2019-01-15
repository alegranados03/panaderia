<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Código de Mesa</th>
            <th>Capacidad de la Mesa</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($mesas as $mesa)
    	<tr class="odd gradeX">
            <td>{{$mesa->codigo_mesa}}</td>
            <td>{{$mesa->capacidad_personas}} personas</td>
            <td class="center">
                <a class="btn btn-info" href="{{route('mesas.show',['id'=> $mesa->id])}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{route('mesas.edit',['id'=> $mesa->id])}}"><i class="fa fa-edit"></i> Editar</a>
                <a class="btn btn-danger" href="{{route('mesas.destroy',['id'=> $mesa->id])}}"><i class="fa fa-trash"></i> Deshabilitar</a>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
