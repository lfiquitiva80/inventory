
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
{!! Form::open(['route' => 'lot.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE LOTES</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#lot'><i class="fas fa-plus-circle"></i> Crear Lote</a>
<a href="{{ route('lotesexport') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>



  @include('lot.create')

  @include('lot.edit')


<p>
<div class="table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Código finca  </td>
      <td>  Centro de Costos</td>
      <td>  Código Lote</td>
      <td>  Nombre Lote</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($lots as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->FINCACODI}}</td>
          <td>{{$row->LOTECODCC}}</td>
          <td>{{$row->LOTECODI}}</td>
          <td>{{$row->LOTENOMB}}</td>

          



          <td><a   data-toggle="modal" data-target="#editar_lot" data-id="{{$row->id}}"
            data-FINCACODI="{{$row->FINCACODI}}"
            data-LOTECODCC="{{$row->LOTECODCC}}"
            data-LOTECODI="{{$row->LOTECODI}}"
            data-LOTENOMB="{{$row->LOTENOMB}}"

           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('lot.destroy')</td>

       
        </td>

    </tr>
  </tbody>

  @endforeach


</table>
</div>

<center>{{ $lots->links() }}</center>

</div>

</div>
</div>


@section('js')
    <script> 

      $(document).ready(function() {

$('#editar_lot').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var fincacodi = button.data('fincacodi')
  var lotecodcc = button.data('lotecodcc')
  var lotecodi = button.data('lotecodi')
  var lotenomb = button.data('lotenomb')

// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #fincacodi').val(fincacodi);
modal.find('.modal-body #lotecodcc').val(lotecodcc);
modal.find('.modal-body #lotecodi').val(lotecodi);
modal.find('.modal-body #lotenomb').val(lotenomb);
})
});
        
     

    </script>
@stop



    @endsection

