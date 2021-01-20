<div class="modal fade" id="editar_inventory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('inventory.update', 'id' )}}"   method="post" id="FormEditinventorys">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">


<div class="form-group" >
        <label for="id">Finca</label>
        {!! Form::select('farm_id',$farm, null, ['class' => 'form-control','name'=>'farm_id','id'=>'farm_id']) !!}
    </div>



<div class="form-group" >
        <label for="id">Lote</label>
            {!! Form::select('lot_id',$lote, null, ['class' => 'form-control','name'=>'lot_id','id'=>'lot_id']) !!}
         </div>    

<div class="form-group" >
        <label for="id">Columna </label>
        {!! Form::number('columna', null,['class' => 'form-control', 'placeholder' => 'Digite la columna','name'=>'columna','id'=>'columna']) !!}
 </div> 

<div class="form-group" >
        <label for="id">Fila </label>
        {!! Form::number('fila', null,['class' => 'form-control', 'placeholder' => 'Digite la Fila','name'=>'fila','id'=>'fila']) !!}
</div>    

<div class="form-group" >
        <label for="id">Estado </label>
        {!! Form::select('statu_id',$statu, null, ['class' => 'form-control','name'=>'statu_id','id'=>'statu_id']) !!}
</div>    

<div class="form-group" >
        <label for="id">Usuario Logueado </label>
        {!! Form::select('user_id',$user, Auth::id(), ['class' => 'form-control','name'=>'user_id','id'=>'user_id']) !!}
</div>            
 

</div>


 

    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>