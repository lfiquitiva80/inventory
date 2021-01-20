<div class="modal fade" id="editar_lot">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('lot.update', 'id' )}}"   method="post" id="FormEditlots">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Código Finca</label>
        {!! Form::text('FINCACODI', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'FINCACODI','id'=>'fincacodi']) !!}
    </div>

<div class="form-group" >
        <label for="id">Centro de Costos</label>
        {!! Form::text('LOTECODCC', null,['class' => 'form-control', 'placeholder' => 'Digite el centro de costos','name'=>'LOTECODCC','id'=>'lotecodcc']) !!}
    </div>    
<div class="form-group" >
        <label for="id">Código Lote</label>
        {!! Form::text('LOTECODI', null,['class' => 'form-control', 'placeholder' => 'Digite el código del Lote','name'=>'LOTECODI','id'=>'lotecodcc']) !!}
    </div>    
<div class="form-group" >
        <label for="id">Descripción Finca</label>
        {!! Form::text('LOTENOMB', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción del Lote','name'=>'LOTENOMB','id'=>'lotenomb']) !!}
    </div>    

    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>