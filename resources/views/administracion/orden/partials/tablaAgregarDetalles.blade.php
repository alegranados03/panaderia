<table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
    <thead>
    	<tr>
            <th>Producto</th>
            <th></th>
            <th>Cantidad</th>
         </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
    	<tr class="odd gradeX">
            <td>{{ Form::label('producto_id', $producto->nombre_producto)}}</td>

            <td width="1%">{{ Form::checkbox('productos[]',$producto->id,null,['class'=>'form-control','id'=>$producto->id,'onclick' => 'habilitarCantidad(this)']) }}</td>

            <td width="1%">{{ Form::number($producto->id,null,['class' => 'form-control','id'=>"input".$producto->id,'disabled', 'min'=>'1'])}}</td>
        </tr>
        @endforeach
    </tbody>
</table>