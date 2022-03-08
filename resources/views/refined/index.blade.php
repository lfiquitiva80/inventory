
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
<!--   <a class="btn btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <i class="fas fa-file-excel"></i> Download Excel
  </a> -->
 
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

  @include('refined.create')
  @include('refined.edit')

<hr>

{!! Form::open(['route' => 'refined.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE ENTREGA REFINADO</h4></b></center>


<a class="btn btn-outline-dark" data-toggle="modal" href='#refined'><i class="fas fa-plus-circle"></i> Crear Refinado Entregado</a>
<!-- <a href="#" class="btn btn-outline-info"><i class="fas fa-file-excel"></i> Download Excel</a> -->







<p>
<div class="table table-sm table-responsive">
<table class="table table-hover" >
  <thead>
    <tr style="background-color: #D1D5DB;">
      <td>  id </td>
      <td>  Remisión</td>
      <td>  Acidez_oleica_entregada</td>
      <td>  Cantidad_Kg</td>
      <td>  Fecha de creación</td>
      <td>  Fecha de Actualización</td>
      <td colspan="2">  Acciones</td>

      


    </tr> 
  </thead>
  <tbody>

  @foreach($refineds as $row)
    <tr>

 
          <td>{{$row->id}}</td>
          <td>{{$row->remision}}</td>
          <td>{{$row->Acidez_oleica_entregada}}</td>
          <td>{{$row->Cantidad_Kg}}</td>
          <td>{{$row->created_at}}</td>
          <td>{{$row->updated_at}}</td>



          


          <td><a   data-toggle="modal" data-target="#editar_refined" data-id="{{$row->id}}"
          
              data-remision="{{$row->remision}}"
              data-acidez="{{$row->Acidez_oleica_entregada}}"
              data-columna="{{$row->columna}}"
              data-cantidad="{{$row->Cantidad_Kg}}"
            

           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('refined.destroy')</td>

       
        </td>

    </tr>
  </tbody>

  @endforeach


</table>
</div>

<center>{{ $refineds->links() }}</center>

</div>

</div>



@section('js')
    <script> 

      $(document).ready(function() {

$('#editar_refined').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var remision= button.data('remision')
  var acidez= button.data('acidez')
  var cantidad= button.data('cantidad')



// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #remision').val(remision);
modal.find('.modal-body #Acidez_oleica_entregada').val(acidez);
modal.find('.modal-body #Cantidad_Kg').val(cantidad);

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


  

