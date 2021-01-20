<div class="modal fade" id="editar_farm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('farm.update', 'id' )}}"   method="post" id="FormEditfarms">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Código Finca</label>
        {!! Form::text('fincacodi', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'fincacodi','id'=>'fincacodi']) !!}
    </div>

<div class="form-group" >
        <label for="id">Descripción Finca</label>
        {!! Form::text('fincadesc', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción de Finca','name'=>'fincadesc','id'=>'fincadesc']) !!}
    </div>    


    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>