<div class="modal fade" id="eradication">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Erradicación</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'eradication.store', 'method'=>'POST','id'=>'FormCreateeradications']) !!}

<div class="row">

	<div class="col-md-3">
<div class="form-group" >
        <label for="id">Finca</label>
        {!! Form::select('farm_id',$farm, null, ['class' => 'form-control erradicacion','name'=>'farm_id','id'=>'farm_id' ,'placeholder'=>'Seleccione...']) !!}
    </div>

</div>
<div class="col-md-3">
<div class="form-group" >
        <label for="id">Lote</label>
        	{!! Form::select('lot_id',$lote, null, ['class' => 'form-control erradicacion','name'=>'lot_id','id'=>'lot_id','placeholder'=>'Seleccione...']) !!}
         </div>    
</div>

<div class="col-md-3">
<div class="form-group" >
        <label for="id">Linea </label>
        {!! Form::number('fila', null,['class' => 'form-control erradicacion', 'placeholder' => 'Digite la Linea','name'=>'fila','id'=>'fila']) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group" >
        <label for="id">Palma </label>
        {!! Form::number('columna', null,['class' => 'form-control erradicacion', 'placeholder' => 'Digite la Palma','name'=>'columna','id'=>'columna']) !!}
 </div> 
</div>

</div>

<div class="row">
	<div class="col-md-3">
<div class="form-group" >
        <label for="id">Enfermedad </label>
    	{!! Form::select('disease_id',$disease, null, ['class' => 'form-control','name'=>'disease_id','placeholder'=>'Seleccione...','title' =>'Cuando se utilice el concepto debera tener la observación del motivo de la erradicación']) !!}
    	
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
		
			<div class="alert alert-info" role="alert">
				<p id='result' style="color:red"></p>
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

			<div class="modal-footer"  >
				<center><button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
    <button type="reset" class="btn btn-danger">Borrar</button></center><p>
			</div>
	{!! Form::close() !!}		
		</div>
	</div>
</div>



    