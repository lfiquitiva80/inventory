{!! Form::open(['route' => 'inventory.index', 'method'=>'GET']) !!}


<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        
        <div class="form-group" >
        <label for="id">Finca</label>
        {!! Form::select('farm_id',$farm, old('farm_id'), ['class' => 'form-control','name'=>'farm_id','placeholder' => 'Seleccione...']) !!}
    </div>

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group" >
        <label for="id">Lote</label>
            {!! Form::select('lot_id',$lote, old('lot_id'), ['class' => 'form-control','name'=>'lot_id','placeholder' => 'Seleccione...']) !!}
         </div>

    </div>

     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="form-group" >
        <label for="id">Fila </label>
        {!! Form::number('fila', old('fila'),['class' => 'form-control', 'placeholder' => 'Digite la Fila','name'=>'fila']) !!}
        </div>   

     </div>

     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

        <div class="form-group" >
        <label for="id">Columna </label>
        {!! Form::number('columna', old('columna'),['class' => 'form-control', 'placeholder' => 'Digite la columna','name'=>'columna']) !!}
    </div>


     </div>


          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

 


     </div>




</div>










  

     





</div>

			<div class="modal-footer">
				<center><button type="submit" class="btn btn-primary" ><i class="fas fa-search"></i> Buscar</button>
    </center><p>
			</div>
	{!! Form::close() !!}		
