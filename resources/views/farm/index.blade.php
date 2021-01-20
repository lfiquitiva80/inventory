
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
{!! Form::open(['route' => 'farm.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE FINCAS</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#farm'><i class="fas fa-plus-circle"></i> Crear Finca</a>
<a href="{{ route('fincasexport') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>



  @include('farm.create')

  @include('farm.edit')


<p>
<div class="table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Código finca  </td>
      <td>  Descripción finca</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($farms as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->fincacodi}}</td>
          <td>{{$row->fincadesc}}</td>



          <td><a   data-toggle="modal" data-target="#editar_farm" data-id="{{$row->id}}"
            data-fincacodi="{{$row->fincacodi}}"
            data-fincadesc="{{$row->fincadesc}}"
           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('farm.destroy')</td>

       
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

$('#editar_farm').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var fincacodi = button.data('fincacodi')
  var fincadesc = button.data('fincadesc')
// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #fincacodi').val(fincacodi);
modal.find('.modal-body #fincadesc').val(fincadesc);
})
});
        
     

    </script>
@stop



    @endsection

