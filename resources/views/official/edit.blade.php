<div class="modal fade" id="editar_official">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('official.update', 'id' )}}"   method="post" id="FormEditofficials">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id"> Cédula </label>
        {!! Form::text('cedula', null,['class' => 'form-control', 'placeholder' => 'Digite la cedula','name'=>'cedula','id'=>'cedula']) !!}
    </div>

<div class="form-group" >
        <label for="id">nombrecompleto</label>
        {!! Form::text('nombrecompleto', null,['class' => 'form-control', 'placeholder' => 'Digite el nombre completo','name'=>'nombrecompleto','id'=>'nombrecompleto']) !!}
    </div>    


    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>