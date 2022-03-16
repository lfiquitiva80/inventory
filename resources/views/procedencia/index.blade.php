@extends('adminlte::page')
    @section('content')
    	<div class="panel-body">
<div class="container">
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route' => 'procedencia.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE TERCEROS</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#procedencia'><i class="fas fa-plus-circle"></i> Crear Tercero de Procedencia</a>
<!-- <a href="{{ route('fincasexport') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a> -->



  @include('procedencia.create')

  @include('procedencia.edit')


<p>
<div class="table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Tercero  </td>
      <td>  Nit</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($procedencias as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->Tercero}}</td>
          <td>{{$row->Nit}}</td>
         



          <td><a   data-toggle="modal" data-target="#editar_procedencia" data-id="{{$row->id}}"
            data-tercero="{{$row->Tercero}}"
            data-nit="{{$row->Nit}}"
           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('procedencia.destroy')</td>

       
        </td>

    </tr>
  </tbody>

  @endforeach


</table>
</div>
</div>

</div>
</div>


@section('js')
    <script> 

      $(document).ready(function() {

$('#editar_procedencia').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var tercero = button.data('tercero')
  var nit = button.data('nit')
// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #tercero').val(tercero);
modal.find('.modal-body #nit').val(nit);
})
});
        
    </script>
@stop

    @endsection

