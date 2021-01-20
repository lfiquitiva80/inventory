<div class="modal fade" id="statu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear estado</h4>
				<button statu="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'statu.store', 'method'=>'POST','id'=>'FormCreatestatus']) !!}


<div class="form-group" >
        <label for="id">Estado</label>
        {!! Form::text('estado', null,['class' => 'form-control', 'placeholder' => 'Digite el Estado','name'=>'estado']) !!}
    </div>

<div class="form-group" >
        <label for="id">Observaciones</label>
        {!! Form::text('observaciones', null,['class' => 'form-control', 'placeholder' => 'Digite la Observación','name'=>'observaciones']) !!}
    </div>    


			</div>
			<div class="modal-footer">
				<center><button statu="submit" class="btn btn-primary" >Guardar</button>
    <button statu="reset" class="btn btn-danger">Borrar</button></center><p>
			</div>
	{!! Form::close() !!}		
		</div>
	</div>
</div>