@extends('adminlte::page')
@section('content')

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
                <div class="card-header"><h1>Aplicación control de Inventarios Propios y Terceros</h1></div>
          

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
<h3>{{number_format($totalacp,0,',','.')}}</h3>
<p>Total acp recibido</p>
</div>
<div class="icon">
<i class="icon-trophy"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{number_format($porcentajeagl,2,',','.')}}<sup style="font-size: 20px">%</sup></h3>
<p>Porcentaje AGL</p>
</div>
<div class="icon">
<i class="fas fa-chart-pie"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>{{number_format($rdb,0,',','.')}}</h3>
<p>RBD a entregar </p>
</div>
<div class="icon">
<i class=""></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>{{number_format($porcentajerdb,2,',','.')}}<sup style="font-size: 20px">%</sup></h3>
<p>Porcentaje RBD </p>
</div>
<div class="icon">
<i class="fas fa-chart-pie"></i>
</div>
<a href="{{route('weighing.index')}}" class="small-box-footer">
More info <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>



<hr>

<table cellspacing="0" style="border-collapse:collapse; width:1911px">
    <tbody>
        <tr>
            <td colspan="6" rowspan="2" style="border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:36px; text-align:center; vertical-align:bottom; white-space:nowrap; width:487px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td colspan="2" rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:2px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap; width:207px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Total acp recibido&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap; width:112px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalacp,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:58px">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap; width:87px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:2px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:normal; width:105px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Total AGL a generar</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:76px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalagl,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:89px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalaglaces,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:72px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalaglent,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:normal; width:97px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;RBD a entregar&nbsp;&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:2px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:89px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp; {{number_format($rdb,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:84px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td colspan="2" rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:.7px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap; width:183px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">RBD entregado&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:2px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap; width:93px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($totalrdbentregado->KD,0,',','.') }}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:73px">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:2px solid black; border-left:none; border-right:none; border-top:none; height:18px; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td style="border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td style="border-bottom:2px solid black; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="6" style="border-bottom:1px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Eficiencias&nbsp;</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:2px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Saldo RBD</span></span></strong></span></td>
            <td style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($saldordb,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:2px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Porcentaje AGL</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($porcentajeagl,2,',','.')}}</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Porcentaje RBD&nbsp;&nbsp;</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($porcentajerdb,2,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="3" style="border-bottom:none; border-left:2px solid black; border-right:2px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Entregas&nbsp;</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:2px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Convertido a CPO</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($conv_acp,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Merma 1%</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($merma,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:17px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Produccion AGL</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:none; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($produccion_agl,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:white"><span style="font-family:Calibri,sans-serif">-13.722.050,22</span></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Convertido a desgomado</span></span></strong></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:1px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($conv_desg,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="3" style="border-bottom:none; border-left:2px solid black; border-right:2px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Saldos</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:2px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">Saldo CPO</span></strong></span></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($saldo_cpo,0,',','.')}}</span></strong></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">AGL a entregar&nbsp;</span></strong></span></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($agl_entregar,0,',','.')}}</span></strong></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">Despacho AGL</span></strong></span></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($desp_agl[0]->PesoNeto,0,',','.')}}</span></strong></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">Saldo AGL anterior 2020</span></strong></span></span></td>
            <td style="background-color:#a6a6a6; border-bottom:1px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($saldo_agl_ant_2020,0,',','.')}}</span></strong></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; height:14px; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
            <td colspan="2" style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:2px solid black; border-right:.7px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:red"><strong><span style="font-family:Calibri,sans-serif">Saldo AGL</span></strong></span></span></td>
            <td style="background-color:#a6a6a6; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($saldo_agl,0,',','.')}}</span></span></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
        </tr>
    </tbody>
</table>


</div>


<!--inicio de tabla-->





                </div>
            </div>
        </div>
    </div>
</div><!--Fin row -->


@section('js')
<script type="text/javascript">
  



</script>

@stop

@endsection
