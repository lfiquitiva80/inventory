
@extends('adminlte::page')

@section('content')
        

<div class="container">


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
       <center><h1>FORMULARIO DE REGISTRO</h1></center>
       <hr>
        <div class="alert alert-info" id="alertahide">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong ><p id="result"></p>  </strong>
    </div>
    </div> 

    
</div>

  {!! Form::open(['route' => 'weighing.store', 'method'=>'POST','id'=>'FormCreateeradications']) !!}


<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">Número de Remisión</span>
        <input type="text" name="NUMREMISION" id="NUMREMISION" class="form-control" value="" required="required"  title="" readonly>
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Neto</span>
        <input type="text" name="NETO" id="NETO" class="form-control" value="" required="required"  title="" readonly>
    </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Procedencia</span>
      
        {!! Form::select('PROCEDENCIA',$procedencia, null, ['class' => 'form-control ','name'=>'PROCEDENCIA','id'=>'PROCEDENCIA' ,'placeholder'=>'Seleccione...', 'required']) !!}
    </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">Placa</span>
        <input type="text" name="PLACA" id="PLACA" class="form-control" value="" required="required"  title=""readonly>
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <span class="label">Acidez Remitida</span>
        <input type="text" name="ACIDEZREMITIDA" id="ACIDEZREMITIDA" class="form-control" value="" required="required"  title="">
    </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
        <span class="label">Humedad + impurezas remitida</span>
        <input type="text" name="HUM_IMP_REMITIDO" id="HUM_IMP_REMITIDO" class="form-control" value="" required="required"  title="">
    </div>
    </div>
</div>

<hr>

<h3><center>DATOS DE RECEPCIÓN</center></h3>
<div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">Fecha</span>
        <input type="text" name="FEC_RECEPCION" id="FEC_RECEPCION" class="form-control" value="" required="required"  title="" readonly>
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Número tiquete </span>
    

        {!! Form::select('NUMTIQUETE',$codigo, null, ['class' => 'form-control bascula','name'=>'NUMTIQUETE','id'=>'NUMTIQUETE' ,'placeholder'=>'Seleccione...', 'required']) !!}

    </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Neto recibido KG</span>
        <input type="text" name="NETO_REC_KILOS" id="NETO_REC_KILOS" class="form-control" value="" required="required"  title="" readonly>
    </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">Acidez recibida</span>
        <input type="text" name="ACIDEZ_RECIBIDA" id="ACIDEZ_RECIBIDA" class="form-control" value="" required="required"  title="">
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Humedad + impurezas recibido </span>
        <input type="text" name="HUM_IMP_RECIBIDA" id="HUM_IMP_RECIBIDA" class="form-control" value="" required="required"  title="">
        </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Diferencias de Origen </span>
        <input type="text" name="DIFERENCIAS_ORIGEN" id="DIFERENCIAS_ORIGEN" class="form-control" value="" required="required"  title="" readonly>
        </div>

    </div>
</div>

<hr>

<h3><center>CALCULO REFINACIÓN MAQUILA </center></h3>
<div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">% Merma refinacion  (AGL) </span>
        <input type="text" name="MERMA" id="MERMA" class="form-control" value="" required="required"  title=""readonly>
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
        <span class="label">Neto agl a producir KG  </span>
        <input type="text" name="NETO_AGL_APROD_KG" id="NETO_AGL_APROD_KG" class="form-control" value="" required="required"  title="" readonly>
    </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
        <span class="label">Neto agl a cesionar a Palmeras</span>
        <input type="text" name="NETO_AGL_ACES_KG" id="NETO_AGL_ACES_KG" class="form-control" value="" required="required"  title="" readonly>
    </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">
        <span class="label">Neto agl a entregar Biod</span>
        <input type="text" name="NETO_AGL_ENT_BIOD_KG" id="NETO_AGL_ENT_BIOD_KG" class="form-control" value="" required="required"  title="" readonly>
    </div>
        
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group">    
        <span class="label">Neto merma </span>
        <input type="text" name="NETO_MERMA" id="NETO_MERMA" class="form-control" value="" required="required"  title="" readonly>
    </div>
    </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
            <span class="label">RBD a entregar KG</span>
      <input type="text" name="RDB" id="RDB" class="form-control" value="" required="required"  title="" readonly>   
  </div>
    </div>
</div>

<hr>


    <button type="submit" class="btn btn-primary">Guardar</button>


</div>


{!! Form::close() !!}


@section('js')

    <script type="text/javascript">
        
                        $('.bascula').change(function(e) {
                            e.preventDefault();
                            var numero = $('#NUMTIQUETE').val();

                                   $.ajax({
                                            url: '{!!URL::to('bascula')!!}',
                                            type: 'GET',
                                            dataType: 'json',
                                            data: {numero: numero},

                                            success:function(data){

                                                console.log(data);

                                                if (data.length == 0 ) {
                                                    
                                                    $('#result').html('No se encuentra el registro!!') ;
                                                    $('#result').css("color","white");
                                                    $('#guardar').attr('disabled', 'disabled');

                                                } else {

                                                     $('#result').html('Se encuentra el ID ' + ' de registro: ' + data[0].numero);
                                                     $('#result').css("color","yellow");
                                                     $('#NUMREMISION').val(data[0].remision); 
                                                     $('#NETO_REC_KILOS').val(data[0].pesoNeto);
                                                     $('#NETO').val(data[0].pesoNetoRemitido);
                                                     $('#PLACA').val(data[0].vehiculo);
                                                     $('#FEC_RECEPCION').val(data[0].fechaNeto);

                                                     $('#guardar').removeAttr('disabled', 'disabled');

                                                     $('#DIFERENCIAS_ORIGEN').val(data[0].pesoNeto-data[0].pesoNetoRemitido);



                                                    
                                               
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


$('#ACIDEZ_RECIBIDA').blur(function(event) {

       var merma= $('#MERMA').val($(this).val() * 1.2);
       var NetoaglaproducirKG= $('#NETO_REC_KILOS').val();
       var calc = (parseInt(NetoaglaproducirKG)/100)*$(this).val() * 1.2;
       var totalrbd= $('#NETO_REC_KILOS').val()-$('#NETO_AGL_ACES_KG').val()-$('#NETO_AGL_ENT_BIOD_KG').val()-$('#NETO_MERMA').val()


        $('#NETO_AGL_APROD_KG').val(Math.ceil(calc));
        $('#NETO_AGL_ACES_KG').val(Math.ceil(calc/2));
        $('#NETO_AGL_ENT_BIOD_KG').val(Math.ceil(calc-(calc/2)));
        $('#NETO_MERMA').val(Math.ceil($('#NETO_REC_KILOS').val()*0.01));

         var totalrbd= $('#NETO_REC_KILOS').val()-$('#NETO_AGL_ACES_KG').val()-$('#NETO_AGL_ENT_BIOD_KG').val()-$('#NETO_MERMA').val();

        $('#RDB').val(Math.ceil(totalrbd));
     
});


    </script>

@stop

@endsection
