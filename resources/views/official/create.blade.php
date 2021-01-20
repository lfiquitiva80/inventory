<div class="modal fade" id="official">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Funcionario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'official.store', 'method'=>'POST','id'=>'FormCreateofficials']) !!}


<div class="form-group" >
        <label for="id">Cédula</label>
        {!! Form::text('cedula', null,['class' => 'form-control', 'placeholder' => 'Digite la cedula','name'=>'cedula']) !!}
    </div>

<div class="form-group" >
        <label for="id">Nombre Completo</label>
        {!! Form::text('nombrecompleto', null,['class' => 'form-control', 'placeholder' => 'Digite el nombre completo','name'=>'nombrecompleto']) !!}
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