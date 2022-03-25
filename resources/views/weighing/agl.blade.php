<!DOCTYPE html>
<html lang="en">

<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="ZxmEPNvIFxCzJ6VbEyQkWN8WSP1zXoqrYm2A7wVn">

    
    
    
    <title>
                Palmeras            </title>

    
    
    
            <link rel="stylesheet" href="http://192.168.10.17:9090/inventory/public/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://192.168.10.17:9090/inventory/public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">

        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
            
                            
            
            
            
            
                
        <link rel="stylesheet" href="http://192.168.10.17:9090/inventory/public/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    
    
    
            
    
    
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div>
                      <br> 
                  {{-- &nbsp;&nbsp;&nbsp;<a class="btn btn-outline-primary col-lg-offset-2" data-toggle="modal" href='#modal-id'><i class="fas fa-table"></i> Tabla por Fincas</a>
                  @include('inventory.tablefarm') --}}
                  <hr>

                </div>
                <div class="card-header"><h1>ACIDO GRASO LIBRE (A.G.L) || {{ $titulo}}</h1></div>
          

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>{{ number_format($saldoagl,0,',','.')}}<sup style="font-size: 20px">Kls</sup></h3>
<p>INVENTARIO FINAL</p>
</div>
<div class="icon">
<i class="icon-trophy"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">

</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{ number_format($saldo_agl,0,',','.')}}<sup style="font-size: 20px">Kls</sup></h3>
<p>TERCEROS </p>
</div>
<div class="icon">
<i class="fas fa-chart-pie"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">

</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>{{ number_format($diferenciaagl,0,',','.')}}<sup style="font-size: 20px">Kls</sup></h3>
<p>PROPIO </p>
</div>
<div class="icon">
<i class=""></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">

</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>{{ number_format($porcentajepropio,2,',','.')}}<sup style="font-size: 20px">%</sup></h3>
<p>Porcentaje PROPIO </p>
</div>
<div class="icon">
<i class="fas fa-chart-pie"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">

</a>
</div>
</div>





</div>


<!--inicio de tabla-->





                </div>
            </div>
        </div>
    </div>
</div><!--Fin row -->


 <script src="http://192.168.10.17:9090/inventory/public/vendor/jquery/jquery.min.js"></script>
        <script src="http://192.168.10.17:9090/inventory/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://192.168.10.17:9090/inventory/public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" ></script>
            
        
            
            
            
            
                            
            
            
            
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@8" ></script>
            
                
        <script src="http://192.168.10.17:9090/inventory/public/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
    
    
    
            <script type="text/javascript">
  



</script>


</body>

</html>
   
   