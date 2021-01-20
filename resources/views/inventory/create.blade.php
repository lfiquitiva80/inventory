<div class="modal fade" id="inventory">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear inventario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'inventory.store', 'method'=>'POST','id'=>'FormCreateinventorys']) !!}


<div class="form-group" >
        <label for="id">Finca</label>
        {!! Form::select('farm_id',$farm, null, ['class' => 'form-control','name'=>'farm_id']) !!}
    </div>



<div class="form-group" >
        <label for="id">Lote</label>
        	{!! Form::select('lot_id',$lote, null, ['class' => 'form-control','name'=>'lot_id']) !!}
         </div>    

<div class="form-group" >
        <label for="id">Columna </label>
        {!! Form::number('columna', null,['class' => 'form-control', 'placeholder' => 'Digite la columna','name'=>'columna']) !!}
 </div> 

<div class="form-group" >
        <label for="id">Fila </label>
        {!! Form::number('fila', null,['class' => 'form-control', 'placeholder' => 'Digite la Fila','name'=>'fila']) !!}
</div>    

<div class="form-group" >
        <label for="id">Estado </label>
    	{!! Form::select('statu_id',$statu, null, ['class' => 'form-control','name'=>'statu_id']) !!}
</div>    

     

<div class="form-group" >
        <label for="id">Usuario Logueado </label>
    	{!! Form::select('user_id',$user, Auth::id(), ['class' => 'form-control','name'=>'statu_id']) !!}
</div>            
 



</div>

			<div class="modal-footer">
				<center><button type="submit" class="btn btn-primary" >Guardar</button>
    <button type="reset" class="btn btn-danger">Borrar</button></center><p>
			</div>
	{!! Form::close() !!}		
		</div>
	</div>
</div>