<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Usuario</th>
            <th>Nombre Completo</th>
            <th>Rol</th>
            <th>Acciones</th>
         </tr>
    </thead>
    <tbody>
      @foreach($users as $usuario)
    	<tr class="odd gradeX">
            <td>{{$usuario->username}}</td>
            <td>{{$usuario->primerNombre }} {{$usuario->segundoNombre }} {{$usuario->primerApellido }} {{$usuario->segundoApellido }}</td>
            <td>{{$usuario->name}}</td>
            <td class="center">
                <a class="btn btn-info" href="{{route('usuarios.show',['id'=> $usuario->id])}}"><i class="fa fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="{{route('usuarios.edit',['id'=> $usuario->id])}}"><i class="fa fa-edit"></i> Editar</a>
            
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
