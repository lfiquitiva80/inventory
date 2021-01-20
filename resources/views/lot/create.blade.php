<div class="modal fade" id="lot">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Crear Lote</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => 'lot.store', 'method'=>'POST','id'=>'FormCreatelots']) !!}


<div class="form-group" >
        <label for="id">Código Finca</label>
        {!! Form::text('FINCACODI', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'FINCACODI']) !!}
    </div>

<div class="form-group" >
        <label for="id">Centro de Costos</label>
        {!! Form::text('LOTECODCC', null,['class' => 'form-control', 'placeholder' => 'Digite el centro de costos','name'=>'LOTECODCC']) !!}
    </div>    
<div class="form-group" >
        <label for="id">Código Lote</label>
        {!! Form::text('LOTECODI', null,['class' => 'form-control', 'placeholder' => 'Digite el código del Lote','name'=>'LOTECODI']) !!}
    </div>    
<div class="form-group" >
        <label for="id">Descripción Finca</label>
        {!! Form::text('LOTENOMB', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción del Lote','name'=>'LOTENOMB']) !!}
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