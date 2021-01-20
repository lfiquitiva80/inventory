<div class="modal fade" id="editar_statu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button statu="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('statu.update', 'id' )}}"   method="post" id="FormEditstatus">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Estado</label>
        {!! Form::text('estado', null,['class' => 'form-control', 'placeholder' => 'Digite el estado','name'=>'estado','id'=>'estado']) !!}
    </div>

<div class="form-group" >
        <label for="id">Observaciones</label>
        {!! Form::text('observaciones', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción','name'=>'observaciones','id'=>'observaciones']) !!}
    </div>    


    <center><button statu="submit" class="btn btn-primary" >Actualizar</button>
    <button statu="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>