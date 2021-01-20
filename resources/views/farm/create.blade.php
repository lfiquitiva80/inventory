<div class="modal fade" id="farm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Finca</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'farm.store', 'method'=>'POST','id'=>'FormCreatefarms']) !!}


<div class="form-group" >
        <label for="id">Código Finca</label>
        {!! Form::text('fincacodi', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'fincacodi']) !!}
    </div>

<div class="form-group" >
        <label for="id">Descripción Finca</label>
        {!! Form::text('fincadesc', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción de Finca','name'=>'fincadesc']) !!}
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