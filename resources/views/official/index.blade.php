
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
{!! Form::open(['route' => 'official.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE FUNCIONARIOS</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#official'><i class="fas fa-plus-circle"></i> Crear cedula</a>
<a href="{{ route('officialexport') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>



  @include('official.create')

  @include('official.edit')


<p>
<div class="table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Cédula </td>
      <td>  Nombre Completo</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($officials as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->cedula}}</td>
          <td>{{$row->nombrecompleto}}</td>
        


          <td><a   data-toggle="modal" data-target="#editar_official" data-id="{{$row->id}}"
            data-cedula="{{$row->cedula}}"
            data-nombrecompleto="{{$row->nombrecompleto}}"
           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('official.destroy')</td>

       
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

$('#editar_official').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var cedula = button.data('cedula')
  var nombrecompleto = button.data('nombrecompleto')
// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #cedula').val(cedula);
modal.find('.modal-body #nombrecompleto').val(nombrecompleto);
})
});
        
     

    </script>
@stop



    @endsection

