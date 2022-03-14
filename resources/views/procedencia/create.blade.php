<div class="modal fade" id="procedencia">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Finca</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'procedencia.store', 'method'=>'POST','id'=>'FormCreateprocedencias']) !!}


<div class="form-group" >
        <label for="id">Tercero</label>
        {!! Form::text('tercero', null,['class' => 'form-control', 'placeholder' => 'Digite el Tercero','name'=>'tercero']) !!}
    </div>

<div class="form-group" >
        <label for="id">Nit Tercero</label>
        {!! Form::text('Nit', null,['class' => 'form-control', 'placeholder' => 'Digite lel Nit','name'=>'Nit']) !!}
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