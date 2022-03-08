<div class="modal fade" id="editar_refined">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">ACTUALIZAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                

<form class="" action="{{route('refined.update', 'id' )}}"   method="post" id="FormEditeradications">

  {{method_field('patch')}}
  {{csrf_field()}}

<input type="hidden" id="id"  name="id" value="">

<div class="row">

    <div class="col-md-3">
<div class="form-group" >
        <label for="id">Remisión</label>
        {!! Form::select('remision',$codigo, null, ['class' => 'form-control ','name'=>'remision','id'=>'remision' ,'placeholder'=>'Seleccione...', 'required']) !!}
    </div>

</div>
<div class="col-md-3">
<div class="form-group" >
        <label for="id">Acidez Oleica Entregada</label>
         {!! Form::number('Acidez_oleica_entregada', null,['class' => 'form-control ', 'placeholder' => 'Acidez Oleica Entregada','name'=>'Acidez_oleica_entregada','id'=>'Acidez_oleica_entregada', 'step' => '0.01', 'required']) !!}
         </div>    
</div>

<div class="col-md-3">
<div class="form-group" >
        <label for="id">Cantidad en Kilogramos </label>
            {!! Form::number('Cantidad_Kg', null,['class' => 'form-control ', 'placeholder' => 'Cantidad_Kg ','name'=>'Cantidad_Kg','id'=>'Cantidad_Kg','required']) !!}
  
</div>
</div>


<div class="col-md-3">
      <label for="id">Usuario Logueado </label>
        {!! Form::select('id_users',$user, Auth::id(), ['class' => 'form-control','name'=>'id_users']) !!}
</div>

</div>

<div class="row">
    <div class="col-md-3">
<div class="form-group" >
 

</div>  
            
</div>



<div class="col-md-3">
<div class="form-group" >
 
</div>
</div>


<div class="col-md-3">    

<div class="form-group" >
  
</div>

</div>

<div class="col-md-3">    

<div class="form-group" >

</div>

</div>

</div>


<div class="row">

    <div class="col-md-6">    
        
   
        
        

</div>

<div class="col-md-6">  

<div class="form-group" >
  
</div>

</div>             
</div>




</div>


 

    <center><button type="submit" class="btn btn-primary" >Actualizar</button>
    <button type="button" class="btn btn-default "data-dismiss="modal" >Cerrar</button></center><p>

</form>



  </div>
</div>

</div>
</div>