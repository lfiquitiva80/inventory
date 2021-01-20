
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
{!! Form::open(['route' => 'statu.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input statu="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button statu="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE ESTADOS</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#statu'><i class="fas fa-plus-circle"></i> Crear estado</a>
<a href="{{ route('estadoexport') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>



  @include('statu.create')

  @include('statu.edit')


<p>
<div class="table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Estado</td>
      <td>  Observaciones</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($status as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->estado}}</td>
          <td>{{$row->observaciones}}</td>



          <td><a   data-toggle="modal" data-target="#editar_statu" data-id="{{$row->id}}"
            data-estado="{{$row->estado}}"
            data-observaciones="{{$row->observaciones}}"
           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('statu.destroy')</td>

       
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

$('#editar_statu').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var estado = button.data('estado')
  var observaciones = button.data('observaciones')
// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #estado').val(estado);
modal.find('.modal-body #observaciones').val(observaciones);
})
});
        
     

    </script>
@stop



    @endsection

