<div class="modal fade" id="type">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Tipo de Erradicaciones</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'type.store', 'method'=>'POST','id'=>'FormCreatetypes']) !!}


<div class="form-group" >
        <label for="id">Tipo de Erradicación</label>
        {!! Form::text('tipo', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'tipo']) !!}
    </div>

<div class="form-group" >
        <label for="id">Observaciones</label>
        {!! Form::text('observaciones', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción de Finca','name'=>'observaciones']) !!}
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