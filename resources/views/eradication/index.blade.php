
  @extends('adminlte::page')



    @section('content')

        
    	<div class="panel-body">
        @include('flash-message')

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <p>
  <a class="btn btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <i class="fas fa-file-excel"></i> Download Excel
  </a>
 
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">

            
            {!! Form::open(['route' => 'erradicacionesexport', 'method'=>'GET', 'Class'=>'form-inline']) !!}
            <label>&nbsp; Fecha Inicial: </label>
            {!! Form::date('fecha', \Illuminate\Support\Carbon::now(), ['class' => 'form-control','name'=>'fecha','required']) !!}
            <label>&nbsp;  Fecha Final: </label>
            {!! Form::date('fechafinal', \Illuminate\Support\Carbon::now(), ['class' => 'form-control','name'=>'fechafinal','required']) !!}&nbsp; 
        <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> Descargar</button>
          {!! Form::close() !!}
        
    
  </div>
</div>

<hr>

{!! Form::open(['route' => 'eradication.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE ERRADICACIONES</h4></b></center>


<a class="btn btn-outline-dark" data-toggle="modal" href='#eradication'><i class="fas fa-plus-circle"></i> Crear Erradicación</a>
<!-- <a href="#" class="btn btn-outline-info"><i class="fas fa-file-excel"></i> Download Excel</a> -->





  @include('eradication.create')

  @include('eradication.edit')


<p>
<div class="table table-sm table-responsive">
<table class="table table-hover" >
  <thead>
    <tr style="background-color: #D1D5DB;">
      <td>  id  </td>
      <td>  Finca </td>
      <td>  Lote</td>
      <td>  Linea</td>
      <td>  Palma</td>
      <td>  Enfermedad</td>
      <td>  Tipo Erradicación</td>
      <td>  Funcionarios</td>
      <td>  Fecha de Erradicación</td>
      <td>  Usuario</td>
      <td>  Observaciones</td>
      <td>  Fecha de creación</td>
      <td>  Fecha de actualización</td>
      <td colspan="2">  Acciones</td>

      


    </tr> 
  </thead>
  <tbody>

  @foreach($eradications as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->farm->fincadesc}}</td>
          <td>{{$row->lot->FullName}}</td>
          <td>{{$row->fila}}</td>
          <td>{{$row->columna}}</td>
          <td>{{$row->disease->enfermedad}}</td>
          <td>{{$row->type->tipo}}</td>
          <td>{{$row->official->nombrecompleto}}</td>
          <td>{{$row->fecha_erradicacion}}<br>
              {{-- <code> {{\Carbon\Carbon::parse($row->fecha_erradicacion)->diffForHumans()}} </code> --}}
          </td>
          <td>{{$row->user->name}}</td>
          <td>{{$row->observaciones}}</td>
          <td>{{$row->created_at}}</td>
          <td>{{$row->updated_at}}</td>


          


          <td><a   data-toggle="modal" data-target="#editar_eradication" data-id="{{$row->id}}"
              data-farm_id="{{$row->farm_id}}"
              data-lot_id="{{$row->lot_id}}"
              data-columna="{{$row->columna}}"
              data-fila="{{$row->fila}}"
              data-disease_id="{{$row->disease_id}}"
              data-type_id="{{$row->type_id}}"
              data-official_id="{{$row->official_id}}"
              data-fecha_erradicacion="{{\Carbon\Carbon::parse($row->fecha_erradicacion)->format('Y-m-d')}}"
              data-user_id="{{$row->user_id}}"
              data-observaciones="{{$row->observaciones}}"
              data-inventory_id="{{$row->inventory_id}}"


           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('eradication.destroy')</td>

       
        </td>

    </tr>
  </tbody>

  @endforeach


</table>
</div>

<center>{{ $eradications->links() }}</center>

</div>

</div>



@section('js')
    <script> 

      $(document).ready(function() {

$('#editar_eradication').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var farm_id= button.data('farm_id')
  var lot_id= button.data('lot_id')
  var columna= button.data('columna')
  var fila= button.data('fila')
  var disease_id= button.data('disease_id')
  var type_id= button.data('type_id')
  var official_id= button.data('official_id')
  var fecha_erradicacion= button.data('fecha_erradicacion')
  var user_id= button.data('user_id')
  var observaciones= button.data('observaciones')
  var inventory_id= button.data('inventory_id')


// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #farm_id').val(farm_id);
modal.find('.modal-body #lot_id').val(lot_id);
modal.find('.modal-body #columna').val(columna);
modal.find('.modal-body #fila').val(fila);
modal.find('.modal-body #disease_id').val(disease_id);
modal.find('.modal-body #type_id').val(type_id);
modal.find('.modal-body #official_id').val(official_id);
modal.find('.modal-body #fecha_erradicacion').val(fecha_erradicacion);
modal.find('.modal-body #user_id').val(user_id);
modal.find('.modal-body #observaciones').val(observaciones);
modal.find('.modal-body #inventory_id').val(inventory_id);

})   
});

      $(document).ready(function() {


                $('.erradicacion').change(function(e) {
                            e.preventDefault();
                            var finca = $('#farm_id').val();
                            var lote = $('#lot_id').val();
                            var fila = $('#fila').val();
                            var columna = $('#columna').val();
                           

                                   $.ajax({
                                            url: '{!!URL::to('inventoryall')!!}',
                                            type: 'GET',
                                            dataType: 'json',
                                            data: {finca: finca, lote: lote, fila: fila , columna : columna},

                                            success:function(data){

                                                if (data.length == 0 ) {

                                                    $('#result').html('No se encuentra en Inventario, por el cual no se puede erradicar!!') ;
                                                    $('#result').css("color","white");
                                                    $('#guardar').attr('disabled', 'disabled');

                                                } else {

                                                     $('#result').html('Se encuentra en Inventario y lo puede registrar con el ' + ' id de registro: ' + data[0].id);
                                                     $('#result').css("color","yellow");
                                                     $('#guardar').removeAttr('disabled', 'disabled');

                                                    
                                               
                                                 }

                                                 console.log(data); 
                                                 
                                                 
                                                 

                                             }

                                               

                                           
                                        })


                                        .done(function() {
                                            console.log('correcto');
                                        })
                                        .fail(function() {
                                            console.log("error");
                                        })
                                        .always(function() {
                                        console.log("complete");
                });
                 

                });

            
              



                
         

            });
        
     

    </script>
@stop



    @endsection


  

