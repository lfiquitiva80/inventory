<div class="modal fade" id="editar_procedencia">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('procedencia.update', 'id' )}}"   method="post" id="FormEditprocedencias">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Nombre Tercero</label>
        {!! Form::text('Tercero', null,['class' => 'form-control', 'placeholder' => 'Digite el Tercero','name'=>'Tercero','id'=>'tercero']) !!}
    </div>

<div class="form-group" >
        <label for="id">Nit</label>
        {!! Form::text('Nit', null,['class' => 'form-control', 'placeholder' => 'Digite el Nit','name'=>'Nit','id'=>'nit']) !!}
    </div>    


    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>