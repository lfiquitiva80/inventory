<div class="modal fade" id="editar_disease">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('disease.update', 'id' )}}"   method="post" id="FormEditdiseases">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Enfermedad</label>
        {!! Form::text('enfermedad', null,['class' => 'form-control', 'placeholder' => 'Digite el código de Finca','name'=>'enfermedad','id'=>'enfermedad']) !!}
    </div>

<div class="form-group" >
        <label for="id">Observaciones</label>
        {!! Form::text('observaciones', null,['class' => 'form-control', 'placeholder' => 'Digite la descripción de Finca','name'=>'observaciones','id'=>'observaciones']) !!}
    </div>    


    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>