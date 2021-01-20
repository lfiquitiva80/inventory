<div class="modal fade" id="review">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Erradicación</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'review.store', 'method'=>'POST','id'=>'FormCreatereviews']) !!}

<div class="row">

	<div class="col-md-3">
<div class="form-group" >
        <label for="id">Finca</label>
        {!! Form::select('farm_id',$farm, null, ['class' => 'form-control','name'=>'farm_id' ,'placeholder'=>'Seleccione...']) !!}
    </div>

</div>
<div class="col-md-3">
<div class="form-group" >
        <label for="id">Lote</label>
        	{!! Form::select('lot_id',$lote, null, ['class' => 'form-control','name'=>'lot_id','placeholder'=>'Seleccione...']) !!}
         </div>    
</div>


<div class="col-md-3">
<div class="form-group" >
        <label for="id">Columna </label>
        {!! Form::number('columna', null,['class' => 'form-control', 'placeholder' => 'Digite la columna','name'=>'columna']) !!}
 </div> 
</div>
<div class="col-md-3">
<div class="form-group" >
        <label for="id">Fila </label>
        {!! Form::number('fila', null,['class' => 'form-control', 'placeholder' => 'Digite la Fila','name'=>'fila']) !!}
</div>
</div>
</div>

<div class="row">
	<div class="col-md-3">
<div class="form-group" >
        <label for="id">Enfermedad </label>
    	{!! Form::select('disease_id',$disease, null, ['class' => 'form-control','name'=>'disease_id','placeholder'=>'Seleccione...']) !!}
</div>

</div>

<div class="col-md-3">
<div class="form-group" >
        <label for="id">Método de Erradicación </label>
    	{!! Form::select('type_id',$type, null, ['class' => 'form-control','name'=>'type_id','placeholder'=>'Seleccione...']) !!}
</div>
</div>

<div class="col-md-3">    

<div class="form-group" >
        <label for="id">Funcionario</label>
    	{!! Form::select('official_id',$official, null, ['class' => 'form-control','name'=>'official_id','placeholder'=>'Seleccione...']) !!}
</div>

</div>

<div class="col-md-3">    

<div class="form-group" >
        <label for="id">Fecha de Erradicación</label>
        {!! Form::date('fecha_erradicacion', \Carbon\Carbon::now(),['class' => 'form-control', 'placeholder' => 'fecha_erradicacion','name'=>'fecha_erradicacion']) !!}
</div>

</div>

</div>


<div class="row">

	<div class="col-md-6">    

<div class="form-group" >
        <label for="id">Código Inventario </label>
    	{!! Form::select('inventory_id',$inventory, null, ['class' => 'form-control','name'=>'inventory_id','placeholder'=>'Seleccione...']) !!}
</div>

</div>

<div class="col-md-6">  

<div class="form-group" >
        <label for="id">Usuario Logueado </label>
    	{!! Form::select('user_id',$user, Auth::id(), ['class' => 'form-control','name'=>'user_id']) !!}
</div>

</div>             
</div>

<div class="form-group">
    <label for="id">Observaciones</label>
   {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Digite una Observación','name'=>'observaciones']) !!}
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