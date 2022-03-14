@extends('adminlte::page')
@notifyCss

@section('content')

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

<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		{!! Form::open(['route' => 'weighing.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Consultar Número de Tiquete" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i> Consultar</button>
{!! Form::close() !!}
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

		  <a class="btn btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <i class="fas fa-file-excel"></i> Download Excel
  </a>
 
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">

            
            {!! Form::open(['route' => 'balanceexport', 'method'=>'GET', 'Class'=>'form-inline']) !!}
            <label>&nbsp; Fecha Inicial: </label>
            {!! Form::date('fecha', \Illuminate\Support\Carbon::now(), ['class' => 'form-control','name'=>'fecha','required']) !!}
            <label>&nbsp;  Fecha Final: </label>
            {!! Form::date('fechafinal', \Illuminate\Support\Carbon::now(), ['class' => 'form-control','name'=>'fechafinal','required']) !!}&nbsp; 
        <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> Descargar</button>
          {!! Form::close() !!}
        
    
  </div>
</div>
		
	</div>
</div>



<table cellspacing="0" style="border-collapse:collapse; width:1833px">
	<tbody>
		<tr>

			<td style="border-bottom:none; border-left:none; border-right:none; border-top:none; solid black; height:93px; text-align:center; vertical-align:bottom; white-space:nowrap; width:62px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
			<td colspan="20" style="border-bottom:none; solid black; border-left:none solid black; border-right:none solid black; border-top:none solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:1693px"><span style="font-size:27px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">BALANCE MAQUILA DE REFINACION BIO D</span></span></strong></span>
				<br><a href="{{ route('weighing.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus-circle"></i> Crear Registro</a>

			</td>
			<td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:71px">&nbsp;

			</td>

		</tr>
		<tr>
			<td colspan="6" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:21px; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></strong></span></td>
			<td colspan="5" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Datos de recepcion&nbsp;</span></span></strong></span></td>
			<td colspan="6" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">calculo maquila refinacion&nbsp;</span></span></strong></span></td>
<!-- 			<td colspan="4" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">refinado entregado&nbsp;</span></span></strong></span></td> -->
			<td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap">&nbsp;</td>
		</tr>
		<tr>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:1px solid black; border-right:1px solid black; border-top:none; height:68px; text-align:center; vertical-align:middle; white-space:normal; width:62px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">numero remision&nbsp;&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Neto</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Procedencia</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Placa&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:56px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Acidez remitida&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:73px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Humedad + impurezas remitida</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:1px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:58px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Fecha&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:143px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Numero tiquete&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:79px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Neto recibido KG&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:56px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Acidez recibida</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:85px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Humedad + impurezas recibido</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:102px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">% Merma refinacion&nbsp; (AGL)&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:74px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Neto agl a producir KG&nbsp;&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:86px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Neto agl a cesionar a Palmeras&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:70px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Neto agl a entregar Biod&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:94px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;Neto merma&nbsp;</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:86px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;RBD a entregar KG&nbsp;</span></span></strong></span></td>

			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:71px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Diferencias origen</span></span></strong></span></td>
			<td style="background-color:#d9d9d9; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:71px"><span style="font-size:13px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Acción</span></span></strong></span></td>

		</tr>

		@foreach($weighings as $row)
		<tr>
			<td style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:17px; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">
				<a href="{{ route('weighing.edit',$row->id)}}">
				{{$row->NUMREMISION}}
				</a>
			</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp; {{$row->NETO}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{$row->proc->Tercero}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{$row->PLACA}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{number_format($row->ACIDEZREMITIDA,2)}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{number_format($row->HUM_IMP_REMITIDO,2)}}</span></span></span></td>
			<td style="background-color:white; border-bottom:none; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{$row->FEC_RECEPCION}}&nbsp;&nbsp;</span></span></span></td>
			<td style="background-color:white; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;{{$row->NUMTIQUETE}}</span></span></span></td>
			<td style="background-color:white; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->NETO_REC_KILOS}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{number_format($row->ACIDEZ_RECIBIDA,2)}}</span></span></span></td>
			<td style="background-color:white; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{number_format($row->HUM_IMP_RECIBIDA,2)}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{number_format($row->MERMA,3)}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->NETO_AGL_APROD_KG}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->NETO_AGL_ACES_KG}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->NETO_AGL_ENT_BIOD_KG}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->NETO_MERMA}}</span></span></span></td>
			<td style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$row->RDB}}</span></span></strong></span></td>
			<td style="background-color:white; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">{{$row->DIFERENCIAS_ORIGEN}}</span></span></span></td>
			<td style="background-color:white; border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:bottom; white-space:nowrap"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">@include('weighing.destroy')</span></span></span></td>
		</tr>

		@endforeach


		
</table>

{{ $weighings->links() }}

<hr>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                   <div class="row">

<hr>

<table cellspacing="0" style="border-collapse:collapse; width:1911px">
    <tbody>
        <tr>
            <td colspan="6" rowspan="2" style="border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; height:36px; text-align:center; vertical-align:bottom; white-space:nowrap; width:487px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td colspan="2" rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:2px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:207px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Total acp recibido&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:112px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalacp,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:2px solid black; vertical-align:bottom; white-space:nowrap; width:58px">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:2px solid black; border-top:2px solid black; vertical-align:bottom; white-space:nowrap; width:87px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:2px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:normal; width:105px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">Total AGL a generar</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:76px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalagl,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:89px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalaglaces,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:72px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalaglent,0,',','.')}}</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:1px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:normal; width:97px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;RBD a entregar&nbsp;&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:2px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:89px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp; {{number_format($rdb,0,',','.')}}</span></span></strong></span></td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:84px"><span style="font-size:15px"><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></span></td>
            <td colspan="2" rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:.7px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:183px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">RBD entregado&nbsp;</span></span></strong></span></td>
            <td rowspan="2" style="background-color:#d9d9d9; border-bottom:2px solid black; border-left:1px solid black; border-right:2px solid black; border-top:2px solid black; text-align:center; vertical-align:middle; white-space:nowrap; width:93px"><span style="font-size:15px"><strong><span style="color:black"><span style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($totalrdbentregado->KD,0,',','.')}}</span></span></strong></span></td>
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








<!-- <x:notify-messages /> -->

@endsection





