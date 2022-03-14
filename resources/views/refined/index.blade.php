
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

            
            {!! Form::open(['route' => 'refinedexport', 'method'=>'GET', 'Class'=>'form-inline']) !!}
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

<h3>Total Despachado: <strong>{{number_format($total,0,',','.')}} Kilos</strong> | Tercero: <strong>900104517-8 (BIO D SA)</strong> | Producto: <strong>(1003)</strong></h3>

<h4><b><center>REGISTROS DE ENTREGA REFINADO</h4></b></center>


<!--<a class="btn btn-outline-dark" data-toggle="modal" href='#refined'><i class="fas fa-plus-circle"></i> Crear Refinado Entregado</a>-->
<!-- <a href="#" class="btn btn-outline-info"><i class="fas fa-file-excel"></i> Download Excel</a> -->







<p>
<div class="table table-sm table-responsive">
<table class="table table-hover" >
  <thead>
    <tr style="background-color: #D1D5DB;">
              <td>Producto</td>
              <td>Fecha</td>
              <td>NIT_Tercero</td>
              <td>Nombre_Tercero</td>
              <td>NIT_Destino</td>
              <td>Nombre_Destino</td>
              <td>Número</td>
              <td>NIT_Transportador</td>
              <td>Nombre_Transportador</td>
              <td>Placa</td>
              <td>Remolque</td>
              <td>Kilos_Despacho</td>
              <td>Kilos_Recibidos</td>
              <td>Diferencia</td>
              <td>AGL_Palmitico_Remitido</td>
              <td>AGL Palmitico_Recibido</td>
              <td>Humedad_Remitido</td>
              <td>Humedad_Recibido</td>
              <td>Impureza_Remitido</td>
              <td>Impureza_Recibido</td>
              <td>Vr_Flete_x_Kilo</td>
              <td>Tipo_Mvto</td>
              <td>Dcto_Salida_Ofimatica</td>
              <td>Tipo_MvtoOfimatica</td>
              <td>sacos</td>
              <td>Origen</td>
              <td>Destino</td>
              <td>T_Operacion</td>
              <td>T_Flete</td>
              <td>reporta</td>
              <td>Ingreso</td>
              <td>Fecha_Ingreso</td>
              <td>nombreConductor</td>
              <td>tipoInterno</td>
              <td>tipoDco</td>
              <td>numero</td>
              <td>pesoBruto</td>
              <td>pesoTara</td>
              <td>unidadMedida</td>
              <td>fechaBruto</td>
              <td>fechaTara</td>
              <td>fechaNeto</td>

      <td colspan="2">  Acciones</td>

      


    </tr> 
  </thead>
  <tbody>

  @foreach($refineds as $row)
    <tr>

 
<td>{{$row->Producto}}</td>
<td>{{$row->Fecha}}</td>
<td>{{$row->NIT_Tercero}}</td>
<td>{{$row->Nombre_Tercero}}</td>
<td>{{$row->NIT_Destino}}</td>
<td>{{$row->Nombre_Destino}}</td>
<td>{{$row->Número}}</td>
<td>{{$row->NIT_Transportador}}</td>
<td>{{$row->Nombre_Transportador}}</td>
<td>{{$row->Placa}}</td>
<td>{{$row->Remolque}}</td>
<td>{{$row->Kilos_Despacho}}</td>
<td>{{$row->Kilos_Recibidos}}</td>
<td>{{$row->Diferencia}}</td>
<td>{{number_format($row->AGL_Palmitico_Remitido,2)}}</td>
<td>{{$row->AGL_Palmitico_Recibido}}</td>
<td>{{$row->Humedad_Remitido}}</td>
<td>{{$row->Humedad_Recibido}}</td>
<td>{{$row->Impureza_Remitido}}</td>
<td>{{$row->Impureza_Recibido}}</td>
<td>{{$row->Vr_Flete_x_Kilo}}</td>
<td>{{$row->Tipo_Mvto}}</td>
<td>{{$row->Dcto_Salida_Ofimatica}}</td>
<td>{{$row->Tipo_MvtoOfimatica}}</td>
<td>{{$row->sacos}}</td>
<td>{{$row->Origen}}</td>
<td>{{$row->Destino}}</td>
<td>{{$row->T_Operacion}}</td>
<td>{{$row->T_Flete}}</td>
<td>{{$row->reporta}}</td>
<td>{{$row->Ingreso}}</td>
<td>{{$row->Fecha_Ingreso}}</td>
<td>{{$row->nombreConductor}}</td>
<td>{{$row->tipoInterno}}</td>
<td>{{$row->tipoDco}}</td>
<td>{{$row->numero}}</td>
<td>{{$row->pesoBruto}}</td>
<td>{{$row->pesoTara}}</td>
<td>{{$row->unidadMedida}}</td>
<td>{{$row->fechaBruto}}</td>
<td>{{$row->fechaTara}}</td>
<td>{{$row->fechaNeto}}</td>




       
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


                $('.refined').change(function(e) {
                            e.preventDefault();
                            var numero = $('#remision').val();
                          
                           

                                   $.ajax({
                                            url: '{!!URL::to('refinedall')!!}',
                                            type: 'GET',
                                            dataType: 'json',
                                            data: {numero: numero},

                                            success:function(data){

                                                if (data.length == 0 ) {


                                                } else {

                                                     $('#Cantidad_Kg').val(data[0].pesoNeto)
                                               
                                                 }

                                             
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


  

